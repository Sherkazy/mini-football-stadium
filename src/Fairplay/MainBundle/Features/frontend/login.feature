Feature: authentication and authorization



  Scenario: User with this email doesn't exist.
    Given I am on "/login"
    When I fill in "username" with "nursultan2010@mail.ru"
    And I fill in "password" with "nursultan"
    And I press "_submit"
    Then I should see "Неправильное имя пользователя или пароль"

  Scenario: Login successfully
    Given I am on "/login"
    When I fill in "username" with "nursultan2010@gmail.com"
    And I fill in "password" with "nursultan"
    And I press "_submit"
    Then I should be on "/"
    And I should see "nursultan2010@gmail.com"