Feature: Homepage


  Scenario: Check Home page link
    When I go to "/"
    Then I follow "Главная"
    Then I should be on "/"