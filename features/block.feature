Feature: Bloc feature
  Scenario: Get blocks
    When I add "Content-Type" header equal to "application/vnd.api+json"
    And I send a "GET" request to "/blocks"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON should be equal to:
    """
      {
          "data": [
              {
                  "type": "block",
                  "id": "1",
                  "attributes": {
                      "body": "test"
                  },
                  "links": {
                      "self": "\/block\/1"
                  }
              },
              {
                  "type": "block",
                  "id": "2",
                  "attributes": {
                      "body": "<b>coucou<\/b>"
                  },
                  "links": {
                      "self": "\/block\/2"
                  }
              }
          ],
          "links": {
              "self": "\/blocks?page=1&limit=20",
              "first": "\/blocks?page=1&limit=20",
              "next": "\/blocks?page=1&limit=20",
              "last": "\/blocks?page=1&limit=20"
          }
      }
    """

  Scenario: Get blocs
    When I add "Content-Type" header equal to "application/vnd.api+json"
    And I send a "GET" request to "/blocks?sort=-name&limit=1&page=2"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON should be equal to:
    """
     {
        "data": [
            {
                "type": "block",
                "id": "2",
                "attributes": {
                    "body": "<b>coucou</b>"
                },
                "links": {
                    "self": "\/block\/2"
                }
            }
        ],
        "links": {
            "self": "\/blocks?sort=-name&page=2&limit=1",
            "first": "\/blocks?sort=-name&page=1&limit=1",
            "next": "\/blocks?sort=-name&page=2&limit=1",
            "last": "\/blocks?sort=-name&page=2&limit=1"
        }
    }
    """

  Scenario: Get block
    When I add "Content-Type" header equal to "application/vnd.api+json"
    And I send a "GET" request to "/blocks/1"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON should be equal to:
    """
     {
        "data":
            {
                "type": "block",
                "id": "1",
                "attributes": {
                    "body": "test"
                },
                "links": {
                    "self": "\/block\/1"
                }
            }
    }
    """