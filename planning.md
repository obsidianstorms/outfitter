# outfitter planning

## Summary

This application is intended to allow a player to define the abilities a game character may be able to use as actions or abilities.  It will act much like an ecommerce shopping cart managing products and shopping carts but there will not be a checkout or payment process.

## Goal

A game player needs to know what their character is able to do and the details of that ability.  The abilities might be restricted to a specific kind of character.  The abilities can be one of three basic categories: spells, weapons, and noncombative.   The player should be able to add or remove abilities and edit the details.  These ability details can be considered categories by which the player can filter and group the relevant abilities.  The player should be able to group a subset of abilities into a saveable list.  Any grouping or listing should be able to have options for display in single or multiple columns.  The ultimate goal is to allow the player to go into a game session with an electronic list of his characters capabilities or to print out paper.  The display layout options should handle single or multiple columns to allow for semi-customizable print and optional cut-out use.

## Functional Details

An action management system should provide for multiple profiles.  The profiles will be password protected and should provide for reset capabilities via email verification.  
* A future functionality being considered is to have multiple profiles available per email address and to allow multiple email addresses per profile.  This would be to allow flexible organizational capabilities on the part of the player and include sharing control of a profile and the contained lists to potentially multiple players.  For simplicity, this feature is not intended for the first release.

The user profile system will include a confirmation email with a hash-based access confirmation mechanism.  It will include an email-based reset request mechanism with a time-restrictive hash code allowing access to the reset password page.  The reset password form will state something to the effect of "If the submitted address was found, an email will be sent momentarily."

An action management system should be able to add, remove, and edit abilities.  While the ability details can be complicated, to start, this application will be concerned with the following ability details:
* name
* type: such as weapon vs spell vs nonspecific
* rangeType: such as self vs touch vs melee vs ranged
  * A future filter might be actual distance values: 10ft, 30ft, 60ft etc
  * A future filter might be effect type: pierce, bludgeon, fire, poison, etc
  * Other future filters might be character (class) restrictions, "school", dice damage, save throw type, etc
* description


An ability management system should also be able to display a list of abilities.  The user should be able to select abilities from a list and save the result for display as a named list.  The list UI should provide for a layout of one-to-N columns. There will be a minimal UI menu containing: myprofile, store.
Future expansions of the action management system UI may include:
* A feature for display color changes based on detail categories.
* A feature to import actions from other formats such as XML, CSS, or similar data structures.
* A feature to interface with the management system via external API.


### Use Cases

Login: A user visits the application and is presented a login form.  The form includes an emailaddress field, a masked password field, a forgotpassword link, a signup link.  Form submission with emailaddress and password will check if fields are not-null.  If null, then redirect to login page with error "Missing information".  If not-null, check if emailaddress exists.  If emailaddress does not exist, redirect to login page with "Invalid login".  If emailaddress exists but password is incorrect, redirect to login page with "Invalid login". If emailaddress and password are correct, then redirect to a myprofile page.

Signup: A user wanting to sign up clicks the signup link on the login form.  A new page loads with required fields: emailaddress, firstname, password, confirmpassword.  Not required fields: lastname.  Submitting the form redirects to a page with a "Thank you for signing up.  Please check your email momentarily for a confirmation request."  The confirmation email contains a link to a "confirmation" endpoint with a generated hash value.

Confirmation: A confirmation page/endpoint receiving a hash value will check if the hash is valid. If valid, the user will be directed to their myprofile page.

Reset Password: A user wanting to reset their password from the login form will click the forgotpassword link and be redirected to a form with a single required field: emailaddress.  The system will generate a reset password email upon submission if the emailaddress value exists.  The subsequent page after submission will only display a vague message: "If email address is found, a reset password email will show up momentarily."  The email will contain a hyperlink with a hash value.  

Confirm Reset Password: The reset password endpoint receiving a hash value will check if hashvalue exists and if the request time is within 24hours of the associated recorded timestamp.  This page will contain a password and confirmpassword field, both required.  If the form submission sees matching password values, the system will accept a new password set for the associated account.  

My Profile: A myprofile page should contain a list of named collections and a resetpassword control.  

Reset Password From Profile: The resetpassword control should allow a user to reset their password from inside the application.  The list of named collections should allow a user to delete or edit or define a new list.  The new functionality should present the complete store list of abilities.  The edit functionality should present the saved list of abilities.

Store: A store page should contain a list of abilities with controls to add new abilities or to interact with the individually listed abilities to add them to an existing list (part of a dropdown) or add them to a new list.


## Data Objects

![Data UML](/outfitter/src/images/common/outfitterdatauml.png)

Note: The temporaryAccessHash is a dual use field.  If hasAccess is false, then the temporaryAccessHash will be used to confirm the email is valid.  If hasAccess is true, or if reset password request has been made, then another hash will be generated and the temporaryAccessTimestamp filled in with now().  If the link (some endpoint + hash value) is queried within X amount of time from the timestamp, then the reset password page will be accessed.



## Technical Overview

This application will require a database (MySQL), a web server (Apache), and a web language (PHP).  To provide flexibility there will be database abstraction (Doctrine).  To help delivery speed, a framework (Silex) and templating engine (Twig) will be used.  

