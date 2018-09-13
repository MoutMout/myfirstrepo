Feature: Search feature
  Scenario: Search nearby restaurants
    When I add "Content-Type" header equal to "application/vnd.api+json"
    And I send a "GET" request to "/search?lat=48.8706675&lng=2.3553493&radius=5000"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON should be equal to:
    """
      {
        "data":[
          {
            "type":"search",
            "id":"1",
            "attributes":{
              "name":"HollyBelly",
              "address":"5 Rue Lucien Sampaix, 75010 Paris",
              "latitude":48.8710039,
              "longitude":2.358543
            },
            "links":{
              "self":"\/search\/1"
            }
          },
          {
            "type":"search",
            "id":"2",
            "attributes":{
              "name":"Boulangerie Papatissier",
              "address":"10 Place Jacques Bonsergent, 75010 Paris",
              "latitude":48.870955,
              "longitude":2.3596486
            },
            "links":{
              "self":"\/search\/2"
            }
          },
          {
            "type": "search",
            "id": "4",
            "attributes": {
              "name": "McDonalds Republique",
              "address": "19 Place de la Republique, 75003 Paris",
              "latitude": 48.867622,
              "longitude": 2.362397
            },
            "links": {
              "self": "\/search\/4"
            }
          },
          {
            "type": "search",
            "id": "5",
            "attributes": {
              "name": "BOULANGERIE",
              "address": "19 RUE BOUCHARDON , 75010 PARIS",
              "latitude": 48.8708305,
              "longitude": 2.3578639
            },
            "links": {
              "self": "\/search\/5"
            }
          },
          {
            "type": "search",
            "id": "6",
            "attributes": {
              "name": "FRANPRIX 5278",
              "address": "16 RUE BOUCHARDON , 75010 PARIS",
              "latitude": 48.8704948,
              "longitude": 2.3576760
            },
            "links": {
              "self": "\/search\/6"
            }
          },
          {
            "type": "search",
            "id": "7",
            "attributes": {
              "name": "LA PENDULE OCCITANE",
              "address": "27 RUE BOUCHARDON , 75010 PARIS",
              "latitude": 48.8711433,
              "longitude": 2.3579459
            },
            "links": {
              "self": "\/search\/7"
            }
          },
          {
            "type": "search",
            "id": "8",
            "attributes": {
              "name": "LE REVEIL DU XEME",
              "address": "35 RUE DU CHATEAU D EAU 29 RUE BOUCHARDON, 75010 PARIS",
              "latitude": 48.8712272,
              "longitude": 2.3580179
            },
            "links": {
              "self": "\/search\/8"
            }
          },
          {
            "type": "search",
            "id": "9",
            "attributes": {
              "name": "LA CASBA MAROCAINE",
              "address": "31 RUE DU CHATEAU D EAU MARCHE SAINT MARTIN, 75010 PARIS",
              "latitude": 48.8706283,
              "longitude": 2.3578836
            },
            "links": {
              "self": "\/search\/9"
            }
          },
          {
            "type": "search",
            "id": "10",
            "attributes": {
              "name": "LA PETITE LOUISE",
              "address": "54 RUE DU CHATEAU D EAU ANGLE RUE DU FAUBOURG SAINT MARTIN, 75010 PARIS",
              "latitude": 48.8719367,
              "longitude": 2.3570299
            },
            "links": {
              "self": "\/search\/10"
            }
          },
          {
            "type": "search",
            "id": "11",
            "attributes": {
              "name": "CHICHE",
              "address": "29 BIS RUE DU CHATEAU D EAU , 75010 PARIS",
              "latitude": 48.8708839,
              "longitude": 2.3586773
            },
            "links": {
              "self": "\/search\/11"
            }
          },
          {
            "type": "search",
            "id": "12",
            "attributes": {
              "name": "MIAM",
              "address": "9 CITE RIVERIN , 75010 PARIS",
              "latitude": 48.8705940,
              "longitude": 2.3584539
            },
            "links": {
              "self": "\/search\/12"
            }
          },
          {
            "type": "search",
            "id": "13",
             "attributes": {
               "name": "POINT BAR",
               "address": "2 PASSAGE DU MARCHE SAINT MARTIN , 75010 PARIS",
               "latitude": 48.8708686,
               "longitude": 2.3578970
             },
            "links": {
              "self": "\/search\/13"
            }
          },
          {
            "type": "search",
            "id": "15",
            "attributes": {
              "name": "LA PLACE",
              "address": "58 RUE DE LA SABLIERE , 75014 PARIS",
              "latitude": 48.8323783,
              "longitude": 2.3207099
            },
            "links": {
              "self": "\/search\/15"
            }
          },
          {
            "type": "search",
            "id": "17",
            "attributes": {
              "name": "DALAT VIETNAM",
              "address": "31 RUE DE LA SABLIERE , 75014 PARIS",
              "latitude": 48.8320045,
              "longitude": 2.3219854
            },
            "links": {
                "self": "/search/17"
            }
          }
        ]
      }
    """