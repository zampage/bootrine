cli-config.php nur ausführen wenn keine fehler in config.php sind!!!

Datenbank erstellen:
vendor\bin\doctrine orm:schema-tool:create

Datenbank validieren: (wegen mapping...)
vendor\bin\doctrine orm:validate-schema

http://doctrine-orm.readthedocs.io/projects/doctrine-orm/en/latest/reference/annotations-reference.html#annref-jointable