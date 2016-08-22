# bootrine
**bootrine** is a testproject to learn the bootstrap library and doctrine framework.

### FEATURES
------------------
* Finished:
    * Basic Code Structure
    * Basic Database and Entities
    * Login Design
    * Login Logic
    * Registration Design
    * Registration Logic
    * Home Design
    * Display Gallery Thumbnail Logic
    * Add New Gallery Logic
    * Gallery Design (simple)
    * Gallery Logic
    * Image Upload Logic
    * Multiple Image Upload Logic
    * Gallery Design (optimized)

* In Progress:
    * Delete Images


### LINKS
------------------
* http://doctrine-orm.readthedocs.io/projects/doctrine-orm/en/latest/reference/annotations-reference.html
* Online Markdown Editor: http://dillinger.io/

### CLI
------------------
* run cli-config.php only if there are no bugs or errors in config.php!
* Datenbank
    * create: vendor\bin\doctrine orm:schema-tool:create
    * update: vendor\bin\doctrine orm:schema-tool:update --force
    * validate: vendor\bin\doctrine orm:validate-schema

### CODE INFORMATION
------------------
```php
//get doctrine
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

//test db connection
try{
	Manager::get()->getConnection()->connect();
}catch(Exception $e){
	die("ENTITY MANAGER CANNOT CONNECT TO DATABASE");
}

//handling doctrine entitys
//get repository of all entitys
$grepo = Manager::get()->getRepository('Gallery');
//find all entitys of this repository
$galleries = $grepo->findAll();
//get property of the first gallery
$galleries[0]->getName();

//mapping to DB, reference tables (other entitys)
//gallery
/**
* @ManyToOne(targetEntity="Gallery", inversedBy="images")
* @JoinColumn(name="FKgid", referencedColumnName="gid", onDelete="CASCADE")
*/
//image
/** 
* @OneToMany(targetEntity="Image", mappedBy="gallery")
* JoinColumn(name="gid", referencedColumnName="FKgid")
*/
```