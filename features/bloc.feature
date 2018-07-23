Feature: Bloc feature
  Scenario: Get blocs
    When I add "Content-Type" header equal to "application/vnd.api+json"
    And I send a "GET" request to "/blocs"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON should be equal to:
    """
      {
          "data": [
              {
                  "type": "bloc",
                  "id": "1",
                  "attributes": {
                      "body": "test"
                  },
                  "links": {
                      "self": "\/bloc\/1"
                  }
              },
              {
                  "type": "bloc",
                  "id": "2",
                  "attributes": {
                      "body": "<b>coucou</b>"
                  },
                  "links": {
                      "self": "\/bloc\/2"
                  }
              }
          ],
          "links": {
              "self": "\/blocs?page=1&limit=20",
              "first": "\/blocs?page=1&limit=20",
              "next": "\/blocs?page=1&limit=20",
              "last": "\/blocs?page=1&limit=20"
          }
      }
    """

  Scenario: Get blocs
    When I add "Content-Type" header equal to "application/vnd.api+json"
    And I send a "GET" request to "/blocs?sort=-name&limit=1&page=2"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON should be equal to:
    """
     {
        "data": [
            {
                "type": "bloc",
                "id": "2",
                "attributes": {
                    "body": "<b>coucou</b>"
                },
                "links": {
                    "self": "\/bloc\/2"
                }
            }
        ],
        "links": {
            "self": "\/blocs?sort=-name&page=2&limit=1",
            "first": "\/blocs?sort=-name&page=1&limit=1",
            "next": "\/blocs?sort=-name&page=2&limit=1",
            "last": "\/blocs?sort=-name&page=2&limit=1"
        }
    }
    """

  Scenario: Get blocs
    When I add "Content-Type" header equal to "application/vnd.api+json"
    And I send a "GET" request to "/blocs/1"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON should be equal to:
    """
     {
        "data": [
            {
                "type": "bloc",
                "id": "1",
                "attributes": {
                    "body": "test"
                },
                "links": {
                    "self": "\/bloc\/2"
                }
            }
        ]
    }
    """