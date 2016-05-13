# bootrine
**bootrine** is a testproject to learn the bootstrap library and doctrine framework.

### INFO
------------------
* cli-config.php nur ausführen wenn keine fehler in config.php sind!!!
* Datenbank
    * erstellen: vendor\bin\doctrine orm:schema-tool:create
    * updaten: vendor\bin\doctrine orm:schema-tool:update --force
    * validieren: vendor\bin\doctrine orm:validate-schema

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

* In Progress:
    * Gallery Design
    * Gallery Logic

* Not Yet Started:
    * Gallery Editing
    * Image Upload

### TODO / BUGLIST
------------------
* clean dirty code in  home.php
* forbidden pages: back to where you come from after login
* put addGallery from ajax-api.php in GalleryRepository

### LINKS
------------------
* http://doctrine-orm.readthedocs.io/projects/doctrine-orm/en/latest/reference/annotations-reference.html
* Online Markdown Editor: http://dillinger.io/

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