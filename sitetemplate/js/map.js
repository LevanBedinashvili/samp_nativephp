
ymaps.ready(init);

function init() 
{
    var myProjection = new ymaps.projection.Cartesian([
                [-4096, -4096],
                [4096, 4096]
            ]),
            MyLayer = function() { return new ymaps.Layer( function(tile, zoom) { return "/images/map/tile-" + zoom + "-" + tile[1] + "-" + tile[0] + ".jpg"; });};
        
            ymaps.layer.storage.add('my#layer', MyLayer);
            ymaps.mapType.storage.add('my#type', new ymaps.MapType(
                'Схема',
                ['my#layer']
            ));
            myMap = new ymaps.Map('map', {
                center: [0, 0],
                zoom: 3,
                type: 'my#type',
                controls: ['zoomControl']
            }, {
                maxZoom: 5,
                minZoom: 2, 
                
                projection: myProjection,
                restrictMapArea: [[-4096, -4096], [4096, 4096]]
            }),
        objectManagerBiz = new ymaps.ObjectManager({
            
            clusterIconLayout: "default#pieChart"
        });
        myMap.geoObjects.add(objectManagerBiz);

        objectManagerHouse = new ymaps.ObjectManager({
            
            clusterIconLayout: "default#pieChart"
        });
        myMap.geoObjects.add(objectManagerHouse);

    // Создадим 5 пунктов выпадающего списка.
    var listBoxItems = ['Свободный дом', 'Проданный дом', 'Бизнес продается', 'Бизнес куплен']
            .map(function (title) {
                return new ymaps.control.ListBoxItem({
                    data: {
                        content: title
                    },
                    state: {
                        selected: true
                    }
                })
            }),
        reducer = function (filters, filter) {
            filters[filter.data.get('content')] = filter.isSelected();
            return filters;
        },
        // Теперь создадим список, содержащий 5 пунктов.
        listBoxControl = new ymaps.control.ListBox({
            data: {
                content: 'Фильтр',
                title: 'Фильтр'
            },
            items: listBoxItems,
            state: {
                // Признак, развернут ли список.
                expanded: true,
                filters: listBoxItems.reduce(reducer, {})
            }
        });
    myMap.controls.add(listBoxControl);

    // Добавим отслеживание изменения признака, выбран ли пункт списка.
    listBoxControl.events.add(['select', 'deselect'], function (e) {
        var listBoxItem = e.get('target');
        var filters = ymaps.util.extend({}, listBoxControl.state.get('filters'));
        filters[listBoxItem.data.get('content')] = listBoxItem.isSelected();
        listBoxControl.state.set('filters', filters);
    });

    var filterMonitor = new ymaps.Monitor(listBoxControl.state);
    filterMonitor.add('filters', function (filters) {
        // Применим фильтр.
        objectManagerBiz.setFilter(getFilterFunction(filters));
        objectManagerHouse.setFilter(getFilterFunction(filters));
    });

    function getFilterFunction(categories) {
        return function (obj) {
            var content = obj.properties.balloonContent;
            return categories[content]
        }
    }

function addbusiness() {
    var business = [];
    businessList.forEach(function(element, i)
    {
        business.push(
            {
                "type": "Feature", 
                "id": i, 
                "geometry": 
                {
                    "type": "Point", 
                    "coordinates": [businessList[i].y, businessList[i].x]
                }, 
                "properties": 
                    {
                        "balloonContentHeader": businessList[i].address,
                        "balloonContentFooter": businessList[i].owner,
                        "balloonContent": businessList[i].type, 
                        "clusterCaption": businessList[i].type, 
                        "hintContent": businessList[i].address, 
                        "iconCaption": businessList[i].type
                    }, 
                "options": 
                    {
                        "preset": "islands#blueCircleDotIconWithCaption",
                        "iconLayout": "default#image",
                        "iconImageHref": "/images/map_icon/Icon_" + businessList[i].mapIconTypeForSale + ".gif",
                        "iconImageSize": [24,24],
                        "iconImageOffset": [0,0]
                        
                }
        });
    });
    objectManagerBiz.add(business);
    myMap.geoObjects.add(objectManagerBiz);
 }
 function addhouses() {
    var houses = [];
     houseList.forEach(function(element, i)
        {
            houses.push(
                {
                    "type": "Feature",
                    "id": i,
                    "geometry":
                    {
                        "type": "Point",
                        "coordinates": [houseList[i].y, houseList[i].x]
                    },
                    "properties":
                        {
                            "balloonContentHeader": houseList[i].address,
                            "balloonContentFooter": houseList[i].owner,
                            "balloonContent": houseList[i].type,
                            "clusterCaption": houseList[i].type,
                            "hintContent": houseList[i].address,
                            "iconCaption": houseList[i].type
                        },
                    "options":
                        {
                            "preset": "islands#blueCircleDotIconWithCaption",
                            "iconLayout": "default#image",
                            "iconImageHref": "/images/map_icon/Icon_" + houseList[i].mapIconTypeForSale + ".gif",
                            "iconImageSize": [24,24],
                            "iconImageOffset": [0,0]

                    }
            });
         });
    objectManagerHouse.add(houses);
    myMap.geoObjects.add(objectManagerHouse);
 }
setTimeout(addhouses, 1500);
setTimeout(addbusiness, 1500);
}