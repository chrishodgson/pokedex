# chodgson/pokédex

### Install

- clone the repository
- composer install

### Notes

From the root folder: 
- to run unit tests `vendor/bin/phpunit tests`
- to run the site `php -S localhost:8000 -t public`

### Functionality

- options to browse the full list of pokémon with a search on pokemon name. 
- each pokémon returned by the search or listing will link to its own page showing:

  - Images
  - Name
  - Species
  - Height 
  - Weight
  - Abilities

- uses a RESTful API at [Pokéapi](https://pokeapi.co/) to return the results.