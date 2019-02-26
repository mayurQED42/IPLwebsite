<?php

namespace Drupal\myform\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class Myform extends ConfigFormBase{
    protected function getEditableConfigNames() {  
        return [  
          'myform.settings',  
        ];  
      }  
    public function getFormId() {  
        return 'myform';  
     }  
    public function buildForm(array $form, FormStateInterface $form_state) {  
        $config = $this->config('myform.settings');  
    
        $form['name'] = [  
          '#type' => 'textfield',  
          '#title' => $this->t('name'), 
          '#default_value' => $config->get('myform.name'),
          '#required' => TRUE  
        ];  
        $form['dob'] = array (
            '#type' => 'date',
            '#title' => $this->t('DOB'),
            '#required' => TRUE,
          );
          $form['candidate_gender'] = array (
            '#type' => 'select',
            '#title' => ('Gender'),
            '#options' => array(
              'Female' => $this->t('Female'),
              'male' => $this->t('Male'),
            ),
          );
      
        return parent::buildForm($form, $form_state);  
      }  
      public function validateForm(array &$form, FormStateInterface $form_state){
        parent::validateForm($form, $form_state);
        $name = $form_state->getValue('name');
        if (!preg_match('/^[\p{L} ]+$/u', $name)){
            $form_state->setErrorByName('name', $this->t('name only contains alphabet letters and spaces.'));
        }
      }
      public function submitForm(array &$form, FormStateInterface $form_state) {
        $values = $form_state->getValues();
        $this->config('myform.settings')
          ->set('name', $values['name'])
          ->set('dob', $values['dob'])
          ->set('candidate_gender', $values['candidate_gender'])
          ->save();
          return parent::submitForm($form, $form_state);
        }
}