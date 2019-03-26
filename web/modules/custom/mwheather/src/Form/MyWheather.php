<?php

namespace Drupal\mwheather\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class MyWheather extends ConfigFormBase{
    protected function getEditableConfigNames() {  
        return [  
          'mwheather.settings',  
        ];  
      }
    public function getFormId() {  
        return 'mwheather';  
     }
    public function buildForm(array $form, FormStateInterface $form_state){
        $config = $this->config('mwheather.settings');

        $form['appid'] = [  
            '#type' => 'textfield',  
            '#title' => $this->t('App Id : '), 
            '#default_value' => $config->get('mwheather.appid'),
            '#required' => TRUE  
          ];
        return parent::buildForm($form, $form_state);
    }
    public function submitForm(array &$form, FormStateInterface $form_state){
        $values = $form_state->getValues();
        $this->config('mwheather.settings')
          ->set('appid', $values['appid'])
          ->save();
        return parent::submitForm($form, $form_state);
    }
}