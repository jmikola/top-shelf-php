Feature: Contact form
  In order to contact an email address
  As a visitor
  I need to be able to submit a contact form

  Scenario: Successfully submit the contact form
    Given I am on "/demo/contact"
    When I fill in "Email" with "user@example.com"
     And I fill in "Message" with "Hello there!"
     And I press "Send"
    Then I should see "Message sent!"
