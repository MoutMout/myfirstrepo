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
          }
        ]
      }
    """