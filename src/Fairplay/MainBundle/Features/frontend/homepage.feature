Feature: Homepage


  Scenario: Check homepage route status code
    When I go to "/"
    Then the response status code should be 200

  @javascript
  Scenario: Search stadiums by district
    When I go to "/"
    And I select "Tokmok" from "district"
    Then I should see "Barcelona"