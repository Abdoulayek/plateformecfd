<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Abdou
{
/**
 * @ORM\Column(type="array")
 */
private $paths;

/**
 * @ORM\PreFlush()
 */
public function upload()
{
    foreach($this->files as $file)
    {
        $path = sha1(uniqid(mt_rand(), true)).'.'.$file->guessExtension();
        array_push ($this->paths, $path);
        $file->move($this->getUploadRootDir(), $path);

        unset($file);
    }
}
}