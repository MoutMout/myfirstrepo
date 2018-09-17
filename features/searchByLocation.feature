Feature: Search feature
  Scenario: Search nearby restaurants
    When I add "Content-Type" header equal to "application/vnd.api+json"
    And I send a "GET" request to "/search?lat=48.8706675&lng=2.3553493"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON should be equal to:
    """
        {
          "data": [
              {
                  "type": "search",
                  "id": "1",
                  "attributes": {
                      "name": "HollyBelly",
                      "address": "5 Rue Lucien Sampaix, 75010 Paris",
                      "latitude": 48.8710039,
                      "longitude": 2.358543
                  },
                  "links": {
                      "self": "/search/1"
                  }
              },
              {
                  "type": "search",
                  "id": "2",
                  "attributes": {
                      "name": "Boulangerie Papatissier",
                      "address": "10 Place Jacques Bonsergent, 75010 Paris",
                      "latitude": 48.870955,
                      "longitude": 2.3596486
                  },
                  "links": {
                      "self": "/search/2"
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
                      "self": "/search/4"
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
                      "self": "/search/5"
                  }
              },
              {
                  "type": "search",
                  "id": "6",
                  "attributes": {
                      "name": "FRANPRIX 5278",
                      "address": "16 RUE BOUCHARDON , 75010 PARIS",
                      "latitude": 48.8704948,
                      "longitude": 2.357676
                  },
                  "links": {
                      "self": "/search/6"
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
                      "self": "/search/7"
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
                      "self": "/search/8"
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
                      "self": "/search/9"
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
                      "self": "/search/10"
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
                      "self": "/search/11"
                  }
              },
              {
                  "type": "search",
                  "id": "12",
                  "attributes": {
                      "name": "MIAM",
                      "address": "9 CITE RIVERIN , 75010 PARIS",
                      "latitude": 48.870594,
                      "longitude": 2.3584539
                  },
                  "links": {
                      "self": "/search/12"
                  }
              },
              {
                  "type": "search",
                  "id": "13",
                  "attributes": {
                      "name": "POINT BAR",
                      "address": "2 PASSAGE DU MARCHE SAINT MARTIN , 75010 PARIS",
                      "latitude": 48.8708686,
                      "longitude": 2.357897
                  },
                  "links": {
                      "self": "/search/13"
                  }
              },
              {
                  "type": "search",
                  "id": "29",
                  "attributes": {
                      "name": "Mulko",
                      "address": "29 Rue D Enghien, 75010 Paris",
                      "latitude": 48.871894,
                      "longitude": 2.3505208
                  },
                  "links": {
                      "self": "/search/29"
                  }
              },
              {
                  "type": "search",
                  "id": "32",
                  "attributes": {
                      "name": "La Casba Marocaine",
                      "address": "31 Rue Du Chateau D Eau Marche Saint Marti,n75010 Paris",
                      "latitude": 48.870628,
                      "longitude": 2.3578836
                  },
                  "links": {
                      "self": "/search/32"
                  }
              },
              {
                  "type": "search",
                  "id": "33",
                  "attributes": {
                      "name": "Rest Cote D Azur",
                      "address": "6 Rue Du Chateau D Eau, 75010 Paris",
                      "latitude": 48.869449,
                      "longitude": 2.3615
                  },
                  "links": {
                      "self": "/search/33"
                  }
              },
              {
                  "type": "search",
                  "id": "34",
                  "attributes": {
                      "name": "Restaurant Eldoredo",
                      "address": "82 Rue D Hauteville, 75010 Paris",
                      "latitude": 48.87627,
                      "longitude": 2.35116
                  },
                  "links": {
                      "self": "/search/34"
                  }
              },
              {
                  "type": "search",
                  "id": "36",
                  "attributes": {
                      "name": "Restaurant New Pondichery",
                      "address": "189 Rue Du Faubourg Saint Denis, 75010 Paris",
                      "latitude": 48.8661,
                      "longitude": 2.3508601
                  },
                  "links": {
                      "self": "/search/36"
                  }
              },
              {
                  "type": "search",
                  "id": "38",
                  "attributes": {
                      "name": "Rest L Aubrac",
                      "address": "19 Rue De Chabrol, 75010 Paris",
                      "latitude": 48.876579,
                      "longitude": 2.3543369
                  },
                  "links": {
                      "self": "/search/38"
                  }
              },
              {
                  "type": "search",
                  "id": "39",
                  "attributes": {
                      "name": "Le Select Strasbourg",
                      "address": "35 Boulevard De Strasbourg, 75010 Paris",
                      "latitude": 48.87136,
                      "longitude": 2.35538
                  },
                  "links": {
                      "self": "/search/39"
                  }
              },
              {
                  "type": "search",
                  "id": "40",
                  "attributes": {
                      "name": "La Marine",
                      "address": "55B Quai De Valmy, 75010 Paris",
                      "latitude": 48.870731,
                      "longitude": 2.3654599
                  },
                  "links": {
                      "self": "/search/40"
                  }
              },
              {
                  "type": "search",
                  "id": "41",
                  "attributes": {
                      "name": "Rest Les Voisins",
                      "address": "27 Rue Y Toudic, 75010 Paris",
                      "latitude": 48.87107,
                      "longitude": 2.3627657
                  },
                  "links": {
                      "self": "/search/41"
                  }
              },
              {
                  "type": "search",
                  "id": "42",
                  "attributes": {
                      "name": "Rest Au Petit Moine",
                      "address": "89 Boulevard Strasbourg, 75010 Paris",
                      "latitude": 48.875888,
                      "longitude": 2.3577399
                  },
                  "links": {
                      "self": "/search/42"
                  }
              },
              {
                  "type": "search",
                  "id": "45",
                  "attributes": {
                      "name": "Rest Strabourgeoise",
                      "address": "5 Rue Du 8 Mai 1945, 75010 Paris",
                      "latitude": 48.876068,
                      "longitude": 2.3588099
                  },
                  "links": {
                      "self": "/search/45"
                  }
              },
              {
                  "type": "search",
                  "id": "48",
                  "attributes": {
                      "name": "Burger King K0399",
                      "address": "93 Boulevard De Strasbourg, 75010 Paris",
                      "latitude": 48.87611,
                      "longitude": 2.3574469
                  },
                  "links": {
                      "self": "/search/48"
                  }
              },
              {
                  "type": "search",
                  "id": "50",
                  "attributes": {
                      "name": "Rest Ville D Epinal",
                      "address": "5 Rue D Alsace, 75010 Paris",
                      "latitude": 48.876758,
                      "longitude": 2.3577001
                  },
                  "links": {
                      "self": "/search/50"
                  }
              },
              {
                  "type": "search",
                  "id": "53",
                  "attributes": {
                      "name": "Relais Martel",
                      "address": "1 Rue Martel, 75010 Paris",
                      "latitude": 48.873428,
                      "longitude": 2.3526878
                  },
                  "links": {
                      "self": "/search/53"
                  }
              },
              {
                  "type": "search",
                  "id": "55",
                  "attributes": {
                      "name": "Rest Chez Alberto",
                      "address": "55 Rue De Lancry, 75010 Paris",
                      "latitude": 48.871799,
                      "longitude": 2.36241
                  },
                  "links": {
                      "self": "/search/55"
                  }
              },
              {
                  "type": "search",
                  "id": "59",
                  "attributes": {
                      "name": "Cafe Chez Prune",
                      "address": "36 Rue Beaurepaire, 75010 Paris",
                      "latitude": 48.871601,
                      "longitude": 2.3643798
                  },
                  "links": {
                      "self": "/search/59"
                  }
              },
              {
                  "type": "search",
                  "id": "62",
                  "attributes": {
                      "name": "Rest Pte Rose Sables",
                      "address": "6 Rue De Lancry, 75010 Paris",
                      "latitude": 48.868938,
                      "longitude": 2.3601
                  },
                  "links": {
                      "self": "/search/62"
                  }
              },
              {
                  "type": "search",
                  "id": "66",
                  "attributes": {
                      "name": "Traiteur Ozlem",
                      "address": "57 Rue Ptes Ecuries, 75010 Paris",
                      "latitude": 48.873893,
                      "longitude": 2.3485119
                  },
                  "links": {
                      "self": "/search/66"
                  }
              },
              {
                  "type": "search",
                  "id": "67",
                  "attributes": {
                      "name": "Traiteur Schmid",
                      "address": "76 Boulevard Strasbourg, 75010 Paris",
                      "latitude": 48.87585,
                      "longitude": 2.3580899
                  },
                  "links": {
                      "self": "/search/67"
                  }
              },
              {
                  "type": "search",
                  "id": "69",
                  "attributes": {
                      "name": "Boul Peches Normands",
                      "address": "9 Rue Fg Temple, 75010 Paris",
                      "latitude": 48.868255,
                      "longitude": 2.3654489
                  },
                  "links": {
                      "self": "/search/69"
                  }
              },
              {
                  "type": "search",
                  "id": "71",
                  "attributes": {
                      "name": "Le Coeur Du Liban",
                      "address": "56 Rue De Lancry, 75010 Paris",
                      "latitude": 48.872348,
                      "longitude": 2.3631958
                  },
                  "links": {
                      "self": "/search/71"
                  }
              },
              {
                  "type": "search",
                  "id": "74",
                  "attributes": {
                      "name": "Pizza Hut 512",
                      "address": "26 Boulevard Bonne Nouvelle, 75010 Paris",
                      "latitude": 48.870544,
                      "longitude": 2.3503429
                  },
                  "links": {
                      "self": "/search/74"
                  }
              },
              {
                  "type": "search",
                  "id": "77",
                  "attributes": {
                      "name": "Restaurant Assanabel",
                      "address": "6 Rue P Chausson, 75010 Paris",
                      "latitude": 48.870498,
                      "longitude": 2.3604791
                  },
                  "links": {
                      "self": "/search/77"
                  }
              },
              {
                  "type": "search",
                  "id": "80",
                  "attributes": {
                      "name": "Sandwicherie",
                      "address": "46 Rue R Boulanger, 75010 Paris",
                      "latitude": 48.868499,
                      "longitude": 2.36026
                  },
                  "links": {
                      "self": "/search/80"
                  }
              },
              {
                  "type": "search",
                  "id": "82",
                  "attributes": {
                      "name": "Rest La Caravelle",
                      "address": "52 Rue Fg Poissonniere, 75010 Paris",
                      "latitude": 48.874572,
                      "longitude": 2.3483939
                  },
                  "links": {
                      "self": "/search/82"
                  }
              },
              {
                  "type": "search",
                  "id": "85",
                  "attributes": {
                      "name": "Rest Le Bois Rouge",
                      "address": "14 Rue De La Fidelite, 75010 Paris",
                      "latitude": 48.874568,
                      "longitude": 2.35657
                  },
                  "links": {
                      "self": "/search/85"
                  }
              },
              {
                  "type": "search",
                  "id": "86",
                  "attributes": {
                      "name": "Snack Sam",
                      "address": "76 Rue Fg Poissonniere, 75010 Paris",
                      "latitude": 48.87635,
                      "longitude": 2.3487379
                  },
                  "links": {
                      "self": "/search/86"
                  }
              },
              {
                  "type": "search",
                  "id": "88",
                  "attributes": {
                      "name": "Rest Iles Aux Cerfs",
                      "address": "8 Passage Du Prado, 75010 Paris",
                      "latitude": 48.86996,
                      "longitude": 2.35383
                  },
                  "links": {
                      "self": "/search/88"
                  }
              },
              {
                  "type": "search",
                  "id": "95",
                  "attributes": {
                      "name": "Boul Hot Breads",
                      "address": "208 Rue Fg St Denis, 75010 Paris",
                      "latitude": 48.86758,
                      "longitude": 2.3516199
                  },
                  "links": {
                      "self": "/search/95"
                  }
              },
              {
                  "type": "search",
                  "id": "99",
                  "attributes": {
                      "name": "Le Dodo",
                      "address": "14 Rue De La Fidelite, 75010 Paris",
                      "latitude": 48.874568,
                      "longitude": 2.35657
                  },
                  "links": {
                      "self": "/search/99"
                  }
              },
              {
                  "type": "search",
                  "id": "100",
                  "attributes": {
                      "name": "Rest Pergola Italia",
                      "address": "87 Rue D Hauteville, 75010 Paris",
                      "latitude": 48.877231,
                      "longitude": 2.3514199
                  },
                  "links": {
                      "self": "/search/100"
                  }
              },
              {
                  "type": "search",
                  "id": "101",
                  "attributes": {
                      "name": "Snack Sushi Sake",
                      "address": "247 Rue Fg St Martin, 75010 Paris",
                      "latitude": 48.866088,
                      "longitude": 2.3538699
                  },
                  "links": {
                      "self": "/search/101"
                  }
              },
              {
                  "type": "search",
                  "id": "102",
                  "attributes": {
                      "name": "Snack Quach",
                      "address": "85B Boulevard Magenta, 75010 Paris",
                      "latitude": 48.87688,
                      "longitude": 2.354974
                  },
                  "links": {
                      "self": "/search/102"
                  }
              },
              {
                  "type": "search",
                  "id": "103",
                  "attributes": {
                      "name": "Snack Uskudar",
                      "address": "18 Rue De L Echiquier, 75010 Paris",
                      "latitude": 48.871311,
                      "longitude": 2.35149
                  },
                  "links": {
                      "self": "/search/103"
                  }
              },
              {
                  "type": "search",
                  "id": "104",
                  "attributes": {
                      "name": "Boulangerie",
                      "address": "19 Rue Bouchardon, 75010 Paris",
                      "latitude": 48.87083,
                      "longitude": 2.3578639
                  },
                  "links": {
                      "self": "/search/104"
                  }
              },
              {
                  "type": "search",
                  "id": "105",
                  "attributes": {
                      "name": "Snack Couleurs Canal",
                      "address": "56 Rue De Lancry, 75010 Paris",
                      "latitude": 48.872329,
                      "longitude": 2.3630928
                  },
                  "links": {
                      "self": "/search/105"
                  }
              },
              {
                  "type": "search",
                  "id": "108",
                  "attributes": {
                      "name": "L Escalier",
                      "address": "105 Rue Fg St Denis, 75010 Paris",
                      "latitude": 48.874923,
                      "longitude": 2.355539
                  },
                  "links": {
                      "self": "/search/108"
                  }
              },
              {
                  "type": "search",
                  "id": "113",
                  "attributes": {
                      "name": "Du Pain Et Des Idees",
                      "address": "34 Rue Y Toudic, 75010 Paris",
                      "latitude": 48.871246,
                      "longitude": 2.362889
                  },
                  "links": {
                      "self": "/search/113"
                  }
              },
              {
                  "type": "search",
                  "id": "114",
                  "attributes": {
                      "name": "Restaurant",
                      "address": "8 Rue Du 8 Mai, 75010 Paris",
                      "latitude": 48.876338,
                      "longitude": 2.3571159
                  },
                  "links": {
                      "self": "/search/114"
                  }
              },
              {
                  "type": "search",
                  "id": "116",
                  "attributes": {
                      "name": "Rest Nishikura",
                      "address": "12 Rue Fg Poissonniere, 75010 Paris",
                      "latitude": 48.868999,
                      "longitude": 2.3477799
                  },
                  "links": {
                      "self": "/search/116"
                  }
              },
              {
                  "type": "search",
                  "id": "118",
                  "attributes": {
                      "name": "Le Virage",
                      "address": "11 Rue De La Fidelite, 75010 Paris",
                      "latitude": 48.874359,
                      "longitude": 2.3554899
                  },
                  "links": {
                      "self": "/search/118"
                  }
              },
              {
                  "type": "search",
                  "id": "123",
                  "attributes": {
                      "name": "Delices Express Qiho",
                      "address": "160 Rue Fg St Denis, 75010 Paris",
                      "latitude": 48.865848,
                      "longitude": 2.3507099
                  },
                  "links": {
                      "self": "/search/123"
                  }
              },
              {
                  "type": "search",
                  "id": "125",
                  "attributes": {
                      "name": "Sesto Senso",
                      "address": "4 Rue De L Echiquier, 75010 Paris",
                      "latitude": 48.871143,
                      "longitude": 2.352868
                  },
                  "links": {
                      "self": "/search/125"
                  }
              },
              {
                  "type": "search",
                  "id": "126",
                  "attributes": {
                      "name": "De La Ville Cafe",
                      "address": "34 Boulevard Bonne Nouvelle, 75010 Paris",
                      "latitude": 48.870777,
                      "longitude": 2.349157
                  },
                  "links": {
                      "self": "/search/126"
                  }
              },
              {
                  "type": "search",
                  "id": "128",
                  "attributes": {
                      "name": "La Zerda",
                      "address": "15 Rue R Boulanger, 75010 Paris",
                      "latitude": 48.869171,
                      "longitude": 2.357268
                  },
                  "links": {
                      "self": "/search/128"
                  }
              },
              {
                  "type": "search",
                  "id": "129",
                  "attributes": {
                      "name": "Le Bourgogne",
                      "address": "26 Rue Des Vinaigriers, 75010 Paris",
                      "latitude": 48.873176,
                      "longitude": 2.363008
                  },
                  "links": {
                      "self": "/search/129"
                  }
              },
              {
                  "type": "search",
                  "id": "130",
                  "attributes": {
                      "name": "Le Moderne",
                      "address": "87 Boulevard Strasbourg, 75010 Paris",
                      "latitude": 48.875835,
                      "longitude": 2.3573501
                  },
                  "links": {
                      "self": "/search/130"
                  }
              },
              {
                  "type": "search",
                  "id": "131",
                  "attributes": {
                      "name": "Le Cafe Pierre",
                      "address": "2 Boulevard De Magenta, 75010 Paris",
                      "latitude": 48.868854,
                      "longitude": 2.3629879
                  },
                  "links": {
                      "self": "/search/131"
                  }
              },
              {
                  "type": "search",
                  "id": "132",
                  "attributes": {
                      "name": "Elgi",
                      "address": "4 Rue Beaurepaire, 75010 Paris",
                      "latitude": 48.869132,
                      "longitude": 2.3634369
                  },
                  "links": {
                      "self": "/search/132"
                  }
              },
              {
                  "type": "search",
                  "id": "133",
                  "attributes": {
                      "name": "Saveurs Des Iles",
                      "address": "16 Rue De Mazagran, 75010 Paris",
                      "latitude": 48.870792,
                      "longitude": 2.3519113
                  },
                  "links": {
                      "self": "/search/133"
                  }
              },
              {
                  "type": "search",
                  "id": "135",
                  "attributes": {
                      "name": "Jiang Nan",
                      "address": "10 Rue De Mazagran, 75010 Paris",
                      "latitude": 48.870498,
                      "longitude": 2.3516612
                  },
                  "links": {
                      "self": "/search/135"
                  }
              },
              {
                  "type": "search",
                  "id": "136",
                  "attributes": {
                      "name": "Jaipur Cafe",
                      "address": "15 Rue Des Messageries, 75010 Paris",
                      "latitude": 48.876293,
                      "longitude": 2.349348
                  },
                  "links": {
                      "self": "/search/136"
                  }
              },
              {
                  "type": "search",
                  "id": "139",
                  "attributes": {
                      "name": "Le Gymnase",
                      "address": "44 Boulevard Bonne Nouvelle, 75010 Paris",
                      "latitude": 48.870834,
                      "longitude": 2.3480141
                  },
                  "links": {
                      "self": "/search/139"
                  }
              },
              {
                  "type": "search",
                  "id": "141",
                  "attributes": {
                      "name": "Pleine Mer",
                      "address": "22 Rue De Chabrol, 75010 Paris",
                      "latitude": 48.876899,
                      "longitude": 2.3535349
                  },
                  "links": {
                      "self": "/search/141"
                  }
              },
              {
                  "type": "search",
                  "id": "143",
                  "attributes": {
                      "name": "Delana",
                      "address": "56 Boulevard Magenta, 75010 Paris",
                      "latitude": 48.873439,
                      "longitude": 2.35888
                  },
                  "links": {
                      "self": "/search/143"
                  }
              },
              {
                  "type": "search",
                  "id": "144",
                  "attributes": {
                      "name": "L Imprevu",
                      "address": "30 Boulevard Bonne Nouvelle, 75010 Paris",
                      "latitude": 48.870681,
                      "longitude": 2.3498489
                  },
                  "links": {
                      "self": "/search/144"
                  }
              },
              {
                  "type": "search",
                  "id": "145",
                  "attributes": {
                      "name": "Le Martel",
                      "address": "3 Rue Martel, 75010 Paris",
                      "latitude": 48.873592,
                      "longitude": 2.3526809
                  },
                  "links": {
                      "self": "/search/145"
                  }
              },
              {
                  "type": "search",
                  "id": "147",
                  "attributes": {
                      "name": "Le Pachy Derme",
                      "address": "2B Boulevard Saint Martin, 75010 Paris",
                      "latitude": 48.868274,
                      "longitude": 2.3615539
                  },
                  "links": {
                      "self": "/search/147"
                  }
              },
              {
                  "type": "search",
                  "id": "150",
                  "attributes": {
                      "name": "Restaurant Sahil",
                      "address": "104 Rue Du Faubourg St Denis, 75010 Paris",
                      "latitude": 48.874897,
                      "longitude": 2.3559107
                  },
                  "links": {
                      "self": "/search/150"
                  }
              },
              {
                  "type": "search",
                  "id": "152",
                  "attributes": {
                      "name": "Le Petit St Martin",
                      "address": "90 Rue Du Fg St Martin, 75010 Paris",
                      "latitude": 48.87091,
                      "longitude": 2.356853
                  },
                  "links": {
                      "self": "/search/152"
                  }
              },
              {
                  "type": "search",
                  "id": "154",
                  "attributes": {
                      "name": "Thai Cuisine",
                      "address": "34 Rue Yves Toudic, 75010 Paris",
                      "latitude": 48.871124,
                      "longitude": 2.362946
                  },
                  "links": {
                      "self": "/search/154"
                  }
              },
              {
                  "type": "search",
                  "id": "155",
                  "attributes": {
                      "name": "Terrasses Du Prieure",
                      "address": "8 Rue Fbg Poissonniere, 75010 Paris",
                      "latitude": 48.871349,
                      "longitude": 2.348411
                  },
                  "links": {
                      "self": "/search/155"
                  }
              },
              {
                  "type": "search",
                  "id": "156",
                  "attributes": {
                      "name": "Boulangerie Ayeb",
                      "address": "71 Rue Faubourg Saint Denis, 75010 Paris",
                      "latitude": 48.872764,
                      "longitude": 2.3541958
                  },
                  "links": {
                      "self": "/search/156"
                  }
              },
              {
                  "type": "search",
                  "id": "157",
                  "attributes": {
                      "name": "Buon Appetito Paris",
                      "address": "31 Rue Du Chateau D Eau, 75010 Paris",
                      "latitude": 48.87096,
                      "longitude": 2.357779
                  },
                  "links": {
                      "self": "/search/157"
                  }
              },
              {
                  "type": "search",
                  "id": "158",
                  "attributes": {
                      "name": "Les Princes",
                      "address": "20 Rue Saint Laurent, 75010 Paris",
                      "latitude": 48.875541,
                      "longitude": 2.3570699
                  },
                  "links": {
                      "self": "/search/158"
                  }
              },
              {
                  "type": "search",
                  "id": "159",
                  "attributes": {
                      "name": "Pizza Tova",
                      "address": "2 Rue Lucien Sampaix, 75010 Paris",
                      "latitude": 48.870685,
                      "longitude": 2.35978
                  },
                  "links": {
                      "self": "/search/159"
                  }
              },
              {
                  "type": "search",
                  "id": "160",
                  "attributes": {
                      "name": "Pizza Grill Istambul",
                      "address": "66 Rue Du Fg Saint Denis, 75010 Paris",
                      "latitude": 48.872646,
                      "longitude": 2.3544418
                  },
                  "links": {
                      "self": "/search/160"
                  }
              },
              {
                  "type": "search",
                  "id": "162",
                  "attributes": {
                      "name": "Laurine",
                      "address": "44 Rue De Lancry, 75010 Paris",
                      "latitude": 48.871719,
                      "longitude": 2.3623199
                  },
                  "links": {
                      "self": "/search/162"
                  }
              },
              {
                  "type": "search",
                  "id": "165",
                  "attributes": {
                      "name": "Kemer",
                      "address": "42 Rue Du Fbg Saint Denis, 75010 Paris",
                      "latitude": 48.871414,
                      "longitude": 2.3537313
                  },
                  "links": {
                      "self": "/search/165"
                  }
              },
              {
                  "type": "search",
                  "id": "168",
                  "attributes": {
                      "name": "Delicieux Degustatio",
                      "address": "8 Rue Faubourg Saint Denis, 75010 Paris",
                      "latitude": 48.87014,
                      "longitude": 2.35288
                  },
                  "links": {
                      "self": "/search/168"
                  }
              },
              {
                  "type": "search",
                  "id": "171",
                  "attributes": {
                      "name": "Cristal",
                      "address": "2 Rue De Mazagran, 75010 Paris",
                      "latitude": 48.870231,
                      "longitude": 2.3513081
                  },
                  "links": {
                      "self": "/search/171"
                  }
              },
              {
                  "type": "search",
                  "id": "174",
                  "attributes": {
                      "name": "Ira Indien",
                      "address": "14 Rue Thorel, 75010 Paris",
                      "latitude": 48.870159,
                      "longitude": 2.349071
                  },
                  "links": {
                      "self": "/search/174"
                  }
              },
              {
                  "type": "search",
                  "id": "176",
                  "attributes": {
                      "name": "Mcdonalds 0286",
                      "address": "84 Boulevard Magenta, 75010 Paris",
                      "latitude": 48.876277,
                      "longitude": 2.3564083
                  },
                  "links": {
                      "self": "/search/176"
                  }
              },
              {
                  "type": "search",
                  "id": "177",
                  "attributes": {
                      "name": "La Ville De Provins",
                      "address": "74 Boulevard De Strasbourg, 75010 Paris",
                      "latitude": 48.875476,
                      "longitude": 2.3578448
                  },
                  "links": {
                      "self": "/search/177"
                  }
              },
              {
                  "type": "search",
                  "id": "178",
                  "attributes": {
                      "name": "Au Bon Cafe",
                      "address": "2 Boulevard Saint Martin, 75010 Paris",
                      "latitude": 48.868114,
                      "longitude": 2.361948
                  },
                  "links": {
                      "self": "/search/178"
                  }
              },
              {
                  "type": "search",
                  "id": "180",
                  "attributes": {
                      "name": "Bob S Juice Bar",
                      "address": "15 Rue Lucien Sampaix, 75010 Paris",
                      "latitude": 48.872066,
                      "longitude": 2.3605756
                  },
                  "links": {
                      "self": "/search/180"
                  }
              },
              {
                  "type": "search",
                  "id": "183",
                  "attributes": {
                      "name": "Le Saulnier",
                      "address": "39 Boulevard De Strasbourg, 75010 Paris",
                      "latitude": 48.871623,
                      "longitude": 2.3552656
                  },
                  "links": {
                      "self": "/search/183"
                  }
              },
              {
                  "type": "search",
                  "id": "184",
                  "attributes": {
                      "name": "La Perle Des Iles",
                      "address": "4 Rue De Paradis, 75010 Paris",
                      "latitude": 48.874507,
                      "longitude": 2.355164
                  },
                  "links": {
                      "self": "/search/184"
                  }
              },
              {
                  "type": "search",
                  "id": "185",
                  "attributes": {
                      "name": "Cantine De Quentin",
                      "address": "52 Rue Bichat, 75010 Paris",
                      "latitude": 48.874061,
                      "longitude": 2.3640599
                  },
                  "links": {
                      "self": "/search/185"
                  }
              },
              {
                  "type": "search",
                  "id": "188",
                  "attributes": {
                      "name": "Rest Chez Carine",
                      "address": "140 Rue Du Fbg Saint Denis, 75010 Paris",
                      "latitude": 48.877368,
                      "longitude": 2.35625
                  },
                  "links": {
                      "self": "/search/188"
                  }
              },
              {
                  "type": "search",
                  "id": "189",
                  "attributes": {
                      "name": "Bar Le Saint Denis",
                      "address": "21 Rue Faubourg Saint Denis, 75010 Paris",
                      "latitude": 48.870468,
                      "longitude": 2.3530399
                  },
                  "links": {
                      "self": "/search/189"
                  }
              },
              {
                  "type": "search",
                  "id": "190",
                  "attributes": {
                      "name": "Indiana Club",
                      "address": "129 Rue Du Fg Saint Martin, 75010 Paris",
                      "latitude": 48.875579,
                      "longitude": 2.359044
                  },
                  "links": {
                      "self": "/search/190"
                  }
              },
              {
                  "type": "search",
                  "id": "191",
                  "attributes": {
                      "name": "Petit Pont Canal 96",
                      "address": "96 Quai De Jemmapes, 75010 Paris",
                      "latitude": 48.873153,
                      "longitude": 2.3643651
                  },
                  "links": {
                      "self": "/search/191"
                  }
              },
              {
                  "type": "search",
                  "id": "192",
                  "attributes": {
                      "name": "Restau De L Avenir",
                      "address": "6 Place Jacques Bonsergent, 75010 Paris",
                      "latitude": 48.871093,
                      "longitude": 2.361273
                  },
                  "links": {
                      "self": "/search/192"
                  }
              },
              {
                  "type": "search",
                  "id": "193",
                  "attributes": {
                      "name": "Au Bouquet",
                      "address": "24 Boulevard Bonne Nouvelle, 75010 Paris",
                      "latitude": 48.870513,
                      "longitude": 2.3504559
                  },
                  "links": {
                      "self": "/search/193"
                  }
              },
              {
                  "type": "search",
                  "id": "196",
                  "attributes": {
                      "name": "Doner And Co Delice D Edessa",
                      "address": "109 Rue Du Faubourg Saint Denis, 75010 Paris",
                      "latitude": 48.875965,
                      "longitude": 2.3559222
                  },
                  "links": {
                      "self": "/search/196"
                  }
              },
              {
                  "type": "search",
                  "id": "198",
                  "attributes": {
                      "name": "Resto Rapide",
                      "address": "54 Rue Albert Thomas, 75010 Paris",
                      "latitude": 48.870933,
                      "longitude": 2.36166
                  },
                  "links": {
                      "self": "/search/198"
                  }
              },
              {
                  "type": "search",
                  "id": "200",
                  "attributes": {
                      "name": "Brasserie De L Est",
                      "address": "7 Rue Du 8 Mai 1945, 75010 Paris",
                      "latitude": 48.876098,
                      "longitude": 2.3586299
                  },
                  "links": {
                      "self": "/search/200"
                  }
              },
              {
                  "type": "search",
                  "id": "202",
                  "attributes": {
                      "name": "Snack Entre Deux",
                      "address": "63 Rue Des Vinaigriers, 75010 Paris",
                      "latitude": 48.87331,
                      "longitude": 2.3584001
                  },
                  "links": {
                      "self": "/search/202"
                  }
              },
              {
                  "type": "search",
                  "id": "205",
                  "attributes": {
                      "name": "Restaurant Fuxia",
                      "address": "15 Rue Jean Poulmarch, 75010 Paris",
                      "latitude": 48.872558,
                      "longitude": 2.3631372
                  },
                  "links": {
                      "self": "/search/205"
                  }
              },
              {
                  "type": "search",
                  "id": "208",
                  "attributes": {
                      "name": "Restaurant Da Mimmo",
                      "address": "39 Boulevard Magenta, 75010 Paris",
                      "latitude": 48.87257,
                      "longitude": 2.3593316
                  },
                  "links": {
                      "self": "/search/208"
                  }
              },
              {
                  "type": "search",
                  "id": "211",
                  "attributes": {
                      "name": "Restaurant Indian Fast Food",
                      "address": "186 Rue Fg St Denis, 75010 Paris",
                      "latitude": 48.866779,
                      "longitude": 2.3512799
                  },
                  "links": {
                      "self": "/search/211"
                  }
              },
              {
                  "type": "search",
                  "id": "212",
                  "attributes": {
                      "name": "Spi",
                      "address": "58 Rue Du Fg Saint Denis, 75010 Paris",
                      "latitude": 48.872383,
                      "longitude": 2.3542718
                  },
                  "links": {
                      "self": "/search/212"
                  }
              },
              {
                  "type": "search",
                  "id": "213",
                  "attributes": {
                      "name": "Monop 2012 Gare De L Est",
                      "address": "13R Du 8 Mai 1945, 75010 Paris",
                      "latitude": 48.876487,
                      "longitude": 2.356297
                  },
                  "links": {
                      "self": "/search/213"
                  }
              },
              {
                  "type": "search",
                  "id": "216",
                  "attributes": {
                      "name": "Ngoun Heng",
                      "address": "1 Rue Ptes Ecuries, 75010 Paris",
                      "latitude": 48.872959,
                      "longitude": 2.3541979
                  },
                  "links": {
                      "self": "/search/216"
                  }
              },
              {
                  "type": "search",
                  "id": "218",
                  "attributes": {
                      "name": "Chez Gregoire",
                      "address": "11 Rue D Hauteville, 75010 Paris",
                      "latitude": 48.872016,
                      "longitude": 2.349893
                  },
                  "links": {
                      "self": "/search/218"
                  }
              },
              {
                  "type": "search",
                  "id": "219",
                  "attributes": {
                      "name": "Eda Restaurant",
                      "address": "132 Rue Faubourg St Martin, 75010 Paris",
                      "latitude": 48.874572,
                      "longitude": 2.3589646
                  },
                  "links": {
                      "self": "/search/219"
                  }
              },
              {
                  "type": "search",
                  "id": "222",
                  "attributes": {
                      "name": "Mems",
                      "address": "1 Rue De Marseille, 75010 Paris",
                      "latitude": 48.871295,
                      "longitude": 2.362559
                  },
                  "links": {
                      "self": "/search/222"
                  }
              },
              {
                  "type": "search",
                  "id": "223",
                  "attributes": {
                      "name": "Pizza Venezia",
                      "address": "66 Rue Du Faubourg Poissonniere, 75010 Paris",
                      "latitude": 48.875934,
                      "longitude": 2.348416
                  },
                  "links": {
                      "self": "/search/223"
                  }
              },
              {
                  "type": "search",
                  "id": "224",
                  "attributes": {
                      "name": "Indiana Bonne Nouvelle",
                      "address": "42B Boulevard Bonne Nouvelle, 75010 Paris",
                      "latitude": 48.870765,
                      "longitude": 2.3482739
                  },
                  "links": {
                      "self": "/search/224"
                  }
              },
              {
                  "type": "search",
                  "id": "228",
                  "attributes": {
                      "name": "Restaurant Le Riad",
                      "address": "69 Boulevard Villette, 75010 Paris",
                      "latitude": 48.8698,
                      "longitude": 2.3462409
                  },
                  "links": {
                      "self": "/search/228"
                  }
              },
              {
                  "type": "search",
                  "id": "229",
                  "attributes": {
                      "name": "Genki",
                      "address": "82 Rue Du Faubourg Saint Denis, 75010 Paris",
                      "latitude": 48.873607,
                      "longitude": 2.3550519
                  },
                  "links": {
                      "self": "/search/229"
                  }
              },
              {
                  "type": "search",
                  "id": "230",
                  "attributes": {
                      "name": "Restaurant Bleu Ciel",
                      "address": "24 Rue Rene Boulanger, 75010 Paris",
                      "latitude": 48.868476,
                      "longitude": 2.3604564
                  },
                  "links": {
                      "self": "/search/230"
                  }
              },
              {
                  "type": "search",
                  "id": "233",
                  "attributes": {
                      "name": "Brasserie Julien 202",
                      "address": "16 Rue Du Fg Saint Denis, 75010 Paris",
                      "latitude": 48.870563,
                      "longitude": 2.353254
                  },
                  "links": {
                      "self": "/search/233"
                  }
              },
              {
                  "type": "search",
                  "id": "235",
                  "attributes": {
                      "name": "Le Cedre Du Liban",
                      "address": "34B Rue Du Fg Poissonniere, 75010 Paris",
                      "latitude": 48.873294,
                      "longitude": 2.348037
                  },
                  "links": {
                      "self": "/search/235"
                  }
              },
              {
                  "type": "search",
                  "id": "236",
                  "attributes": {
                      "name": "Restauration Rapide",
                      "address": "36 Rue Du Faubourg Saint Denis, 75010 Paris",
                      "latitude": 48.8712,
                      "longitude": 2.3535149
                  },
                  "links": {
                      "self": "/search/236"
                  }
              },
              {
                  "type": "search",
                  "id": "241",
                  "attributes": {
                      "name": "Brasserie Flo 203",
                      "address": "7 Cours Des Petites Ecuries, 75010 Paris",
                      "latitude": 48.872543,
                      "longitude": 2.3526799
                  },
                  "links": {
                      "self": "/search/241"
                  }
              },
              {
                  "type": "search",
                  "id": "247",
                  "attributes": {
                      "name": "Blue Marmara",
                      "address": "40 Boulevard Bonne Nouvelle, 75010 Paris",
                      "latitude": 48.870746,
                      "longitude": 2.3485741
                  },
                  "links": {
                      "self": "/search/247"
                  }
              },
              {
                  "type": "search",
                  "id": "248",
                  "attributes": {
                      "name": "Cafe Le Napoleon",
                      "address": "73 Rue Du Faubourg Saint Denis, 75010 Paris",
                      "latitude": 48.872905,
                      "longitude": 2.3542699
                  },
                  "links": {
                      "self": "/search/248"
                  }
              },
              {
                  "type": "search",
                  "id": "249",
                  "attributes": {
                      "name": "Jours De Fete",
                      "address": "72 Quai De Jemmapes, 75010 Paris",
                      "latitude": 48.871429,
                      "longitude": 2.365781
                  },
                  "links": {
                      "self": "/search/249"
                  }
              }
          ]
      }
    """