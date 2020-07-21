<?php
namespace BootstrapForms;

use SilverStripe\Forms\FormField;
use SilverStripe\ORM\ArrayList;

class BootstrapAdminGroupField extends FormField
{

    protected $optionsList;

    public function __construct($name, $title = null, $options = array (), $value = null)
    {
        parent::__construct($name, $title, $value);
        $this->optionsList = $options;

        return $this;
    }


    public function setOptions($opts)
    {
        $this->optionsList = $opts;

        return $this;
    }



    public function getOptions()
    {
        $options = ArrayList::create();
        foreach($this->optionsList as $label => $val) {
            $options->push($val);
        }

        return $options;
    }



    public function Field($attributes = array ())
    {
        return $this->renderWith('BootstrapAdminGroupField');
    }



}
