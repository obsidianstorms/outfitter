# outfitter planning

## Summary

This application is intended to allow a player to define the actions his game character may be able to take.  It will act much like an ecommerce shopping cart managing products and shopping carts but there will not be a checkout or payment process.

## Goal

A game player needs to know what their character is able to do and the details of that action.  The actions might be restricted to a specific kind of character.  The actions can be one of three basic categories: spells, weapons, and noncombative.   The player should be able to add or remove actions and edit the details.  These action details can be considered categories by which the player can filter and group the relevant actions.  The player should be able to group a subset of actions into a saveable list.  Any grouping or listing should be able to have options for display on screen or on paper.  The ultimate goal is to allow the player to go into a game session with an electronic list of his characters capabilities or to print out paper.  The display layout options should provide for at least a list and paragraph layout and a cell-based layout which could be cut up into playing cards.

## Functional Details

An action management system should be able to add, remove, and edit actions.  While the action details can be complicated, to start, this application will be concerned with the following action details:
* name
* range
* description

Future expansions may allow a more specific breakdown to include filter-capable categories such as:
* restrictions (which kind of character, minimum required level), 
* style or type of damage or effect, 
* dice damage 
* saving throw type

An action management system should also be able to display a list of actions.  The user should be able to select actions from a list and save the result for display as a named list.  The list UI should provide for a layout of one-to-N columns.  

Future expansions of the action management system may include:
* An optional feature for display color changes based on detail categories.
* An optional functional feature might be an ability to import actions from other formats such as XML, CSS, or similar data structures.
* An optional functional feature might be an ability to interface with the management system via external API.

An action management system should provide for multiple profiles.  The profiles will be password protected and should provide for reset capabilities via email verification.

## Technical Overview

This application will require a database (MySQL), a web server (Apache), and a web language (PHP).  To provide flexibility there will be database abstraction (Doctrine).  To help delivery speed, a framework (Silex) and templating engine (Twig) will be used.  

