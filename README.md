GnemesSearchBundle
==================

The GnemesSearchBundle adds support for a database and elasticsearch word search in Symfony2.
It is easy to extend and add new providers 

Features include:

- Search text in files stored in Doctrine ORM or Elasticsearch
- Unit tested

Installation
============

This bundle is under development, so for now you have to add the github repository to your composer.json file:

```json
    "repositories" : [{
        "type" : "vcs",
        "url" : "https://github.com/gnemes/gnemes-search-bundle.git"
    }],
```

And then just add the dependency in the require section:

```json
    "gnemes/searchbundle": "dev-master"
```

Then you must add the bundle configuration in your config.yml file:

```yml
gnemes_search:
    source: orm # orm or elastic
```

Usage
=====

You can use it from its web interface or via console command

From UI
-------

Link the web/ folder to your document root. For example 

```bash
    ln -s /path/to/your/project/web /path/to/htdocs/search
```

And then browse to

```json
    http://<IP_ADDR>/search/gnemes/
```

Here enter the text you want to search in the form.

From Console
------------

Use this command to search

```bash
    php bin/console gnemes:search "Text you want to search"
```

Full text database search (ORM)
===============================

If you want the bundle to perform a DB fulltext search, there are a few extra
parameters that you need to set in your config file:

```yml
gnemes_search:
    source: orm
    orm:
        table: "table_name"
        search_field: "field_name"
```

Where:

table_name: Name of the table you want to use in your search.

search_field: Field name of the given table used to search into.

Also, you must configure the database connection parameters as usual.

TODO
----

Change this to an array, so you could search in multiple tables at once