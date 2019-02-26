<?php

namespace Drupal\myform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SimpleForm extends FormBase {
    public function getFormId() {
        return 'simpleform';
      }
    public function buildForm(array $form, FormStateInterface $form_state) {  
        $form['name'] = [  
          '#type' => 'textfield',  
          '#title' => $this->t('name'), 
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
          $form['actions']['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Save'),
            '#button_type' => 'primary',
          ); 
        return $form; 
      }
    public function validateForm(array &$form, FormStateInterface $form_state){
       // parent::validateForm($form, $form_state);
        $name = $form_state->getValue('name');
        if (!preg_match('/^[\p{L} ]+$/u', $name)){
            $form_state->setErrorByName('name', $this->t('name only contains alphabet letters and spaces.'));
        }
      }
    public function submitForm(array &$form, FormStateInterface $form_state) {
        // foreach ($form_state->getValues() as $key => $value) {
        //     drupal_set_message($key . ': ' . $value);
        //   }
        //drupal_set_message('name : ' . $form_state->getValue('name'));
        $this->messenger()->addMessage($this->t('name : ' . $form_state->getValue('name')));
        $this->messenger()->addMessage($this->t('dob : ' . $form_state->getValue('dob')));
        $this->messenger()->addMessage($this->t('gender : ' . $form_state->getValue('candidate_gender')));
          
      }
}
