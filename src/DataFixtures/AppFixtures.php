<?php
namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Pret;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private $manager;
    private $faker;
    public function __construct()
    {
        $this->faker=Factory::create("fr_FR");
    }
    public function load(ObjectManager $manager)
    {
        $this->manager=$manager;
        $this->loadAdherent();
       
        $manager->flush();
    }
    public function loadAdherent(){
        $genre=['male','female'];
        $commune = [
            "78003", "78005", "78006", "78007", "78009", "78010", "78013", "78015", "78020", "78029",
            "78030", "78031", "78033", "78034", "78036", "78043", "78048", "78049", "78050", "78053", "78057",
            "78062", "78068", "78070", "78071", "78072", "78073", "78076", "78077", "78082", "78084", "78087",
            "78089", "78090", "78092", "78096", "78104", "78107", "78108", "78113", "78117", "78118"
            ];
        for($i=0;$1<25;$i++){
            $adherent=new Adherent();
            $adherent ->setNom($this->$faker->lasName())
                      ->setPrenom($this->$faker->firstName($genre[mt_rand(0,1)]))
                      ->setAdresse($this->$faker->streetAdresse())
                      ->setTel($this->$faker->phoneNumber())
                      ->setCodeCommune($commune[mt_rand(0,sizeof($commune)-1)])
                      ->setMail(strtolower($adherent->getNom())."@gmail.com")
                      ->setPassword($adherent->getNom());
                $this->addReference("adherent".$i,$adherent);
                $this->manager->persist($adherent);            
        }
        $adherent=new Adherent();
        $adherent ->setNom("Rolland")
                  ->setPrenom("Stéphane")
                  ->setMail("admin@gmail.com")
                  -setPassword("Rolland");
        $this->manager->persist($adherent);
        $this->manager->flush();
    }
    public function loadPret(){
        for($i=0;$i<25;$i++){
            $max=mt_rand(1,5);
            for($j=0;$j<=$max;$j++){
               $pret=new Pret();
               
            }
        }
    }
}
