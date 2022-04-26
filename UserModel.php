<?php



namespace ramit\phpmvc  ;
use ramit\phpmvc\db\DbModel;
/**
* @package ramit\phpmvc 
*/
abstract class  UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}
