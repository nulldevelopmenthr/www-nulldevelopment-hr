Feature: Basic site check
	In order to see that site works
	As a user
	I need to check few pages around

  Scenario: Check that homepage works
	Given I am on "/"
	And I click "Null Development"
	Then I should see "> /dev/null"
	And I should be on "/"

  Scenario: Check that impressum is available from homepage
	Given I am on "/"
	And I click "Impressum"
	Then I should see "Legal information"
	And I should see "Pravni podaci"
	And I should be on "/impressum"

  Scenario: Check that homepage is available from impressum
	Given I am on "/impressum"
	And I click "Null Development"
	Then I should see "> /dev/null"
	And I should be on "/"
