Feature: Auto completion

  Scenario: Search for the closest McDonald's from wemanity
    When I add "Content-Type" header equal to "application/vnd.api+json"
    And I send a "GET" request to "/closestrestaurants?lat=48.87062&lng=2.357645&search=dona"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON should be equal to:
    """
    {
          "data": [
              {
                  "type": "closestrestaurants",
                  "id": "4",
                  "attributes": {
                      "name": "McDonalds Republique",
                      "address": "19 Place de la Republique, 75003 Paris",
                      "latitude": 48.867622,
                      "longitude": 2.362397
                  },
                  "links": {
                      "self": "/closestrestaurants/4"
                  }
              },
              {
                  "type": "closestrestaurants",
                  "id": "176",
                  "attributes": {
                      "name": "Mcdonalds 0286",
                      "address": "84 Boulevard Magenta, 75010 Paris",
                      "latitude": 48.876277,
                      "longitude": 2.3564083
                  },
                  "links": {
                      "self": "/closestrestaurants/176"
                  }
              },
              {
                  "type": "closestrestaurants",
                  "id": "110",
                  "attributes": {
                      "name": "Mcdonalds 0137",
                      "address": "29 Rue Fg Temple, 75010 Paris",
                      "latitude": 48.869007,
                      "longitude": 2.3677041
                  },
                  "links": {
                      "self": "/closestrestaurants/110"
                  }
              },
              {
                  "type": "closestrestaurants",
                  "id": "175",
                  "attributes": {
                      "name": "Mcdonalds 0128",
                      "address": "25 Rue De Dunkerque, 75010 Paris",
                      "latitude": 48.879829,
                      "longitude": 2.3541009
                  },
                  "links": {
                      "self": "/closestrestaurants/175"
                  }
              },
              {
                  "type": "closestrestaurants",
                  "id": "3",
                  "attributes": {
                      "name": "McDonalds Issy",
                      "address": "Centre Commercial Les Trois Moulins, 4 Allée Sainte-Lucie, 92130 Issy-les-Moulineaux",
                      "latitude": 48.8211241,
                      "longitude": 2.2492704
                  },
                  "links": {
                      "self": "/closestrestaurants/3"
                  }
              }
          ]
      }
    """


  Scenario: Search for the closest McDonald's from sodexo
    When I add "Content-Type" header equal to "application/vnd.api+json"
    And I send a "GET" request to "/closestrestaurants?lat=48.82186&lng=2.25068&search=dona"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON should be equal to:
    """
    {
          "data": [
              {
                  "type": "closestrestaurants",
                  "id": "3",
                  "attributes": {
                      "name": "McDonalds Issy",
                      "address": "Centre Commercial Les Trois Moulins, 4 Allée Sainte-Lucie, 92130 Issy-les-Moulineaux",
                      "latitude": 48.8211241,
                      "longitude": 2.2492704
                  },
                  "links": {
                      "self": "/closestrestaurants/3"
                  }
              },
              {
                  "type": "closestrestaurants",
                  "id": "4",
                  "attributes": {
                      "name": "McDonalds Republique",
                      "address": "19 Place de la Republique, 75003 Paris",
                      "latitude": 48.867622,
                      "longitude": 2.362397
                  },
                  "links": {
                      "self": "/closestrestaurants/4"
                  }
              },
              {
                  "type": "closestrestaurants",
                  "id": "176",
                  "attributes": {
                      "name": "Mcdonalds 0286",
                      "address": "84 Boulevard Magenta, 75010 Paris",
                      "latitude": 48.876277,
                      "longitude": 2.3564083
                  },
                  "links": {
                      "self": "/closestrestaurants/176"
                  }
              },
              {
                  "type": "closestrestaurants",
                  "id": "175",
                  "attributes": {
                      "name": "Mcdonalds 0128",
                      "address": "25 Rue De Dunkerque, 75010 Paris",
                      "latitude": 48.879829,
                      "longitude": 2.3541009
                  },
                  "links": {
                      "self": "/closestrestaurants/175"
                  }
              },
              {
                  "type": "closestrestaurants",
                  "id": "110",
                  "attributes": {
                      "name": "Mcdonalds 0137",
                      "address": "29 Rue Fg Temple, 75010 Paris",
                      "latitude": 48.869007,
                      "longitude": 2.3677041
                  },
                  "links": {
                      "self": "/closestrestaurants/110"
                  }
              }
          ]
      }
    """


