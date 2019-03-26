<?php

namespace Drupal\weather\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class MyWeather extends ConfigFormBase{
    protected function getEditableConfigNames() {  
        return [  
          'weather.settings',  
        ];  
      }
    public function getFormId() {  
        return 'weather';  
     }
    public function buildForm(array $form, FormStateInterface $form_state){
        $config = $this->config('weather.settings');

        $form['appid'] = [  
            '#type' => 'textfield',  
            '#title' => $this->t('App Id : '), 
            '#default_value' => $config->get('weather.appid'),
            '#required' => TRUE  
          ];
        return parent::buildForm($form, $form_state);
    }
    public function submitForm(array &$form, FormStateInterface $form_state){
        $values = $form_state->getValues();
        $this->config('weather.settings')
          ->set('appid', $values['appid'])
          ->save();
        return parent::submitForm($form, $form_state);
    }
}