<?php

namespace Drupal\banner\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Banner' Block.
 *
 * @Block(
 *   id = "banner",
 *   admin_label = @Translation("Banner Block"),
 *   category = @Translation("Banner"),
 * )
 */
class BannerBlock extends BlockBase {

    /**
     * {@inheritdoc}
     */
    public function build() {

        $config = $this->getConfiguration();

        if (!empty($config['banner_block_title'])) {
            $title_banner = $config['banner_block_title'];
        }

        if (!empty($config['banner_block_body'])) {
            $body = $config['banner_block_body'];
        }

        if (!empty($config['banner_block_donation_one'])) {
            $one_button = $config['banner_block_donation_one'];
        }

        if (!empty($config['banner_block_donation_two'])) {
            $two_button = $config['banner_block_donation_two'];
        }

        if (!empty($config['banner_block_donation_three'])) {
            $three_button = $config['banner_block_donation_three'];
        }

        return [
            '#theme' => 'banner',
            '#title' => $title_banner,
            '#body' => $body,
            '#one_button' => $one_button,
            '#two_button' => $two_button,
            '#three_button' => $three_button,
        ];

    }

    /**
     * {@inheritdoc}
     * add fields to the block form
     */
    public function blockForm($form, FormStateInterface $form_state) {
        $form = parent::blockForm($form, $form_state);

        $config = $this->getConfiguration();

        $form['banner_block_title'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Title'),
            '#description' => $this->t('Give a title to your donation banner.'),
            '#default_value' => $config['banner_block_title'] ?? '',
        ];
        $form['banner_block_body'] = [
            '#type' => 'textarea',
            '#title' => $this->t('Body'),
            '#description' => $this->t('Enter the copy for your donation banner.'),
            '#default_value' => $config['banner_block_body'] ?? '',
        ];
        $form['banner_block_donation_one'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Donation value 1'),
            '#description' => $this->t('Enter the first donation value.'),
            '#default_value' => $config['banner_block_donation_one'] ?? '',
        ];
        $form['banner_block_donation_one_button'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Donation button text 1'),
            '#default_value' => $config['banner_block_donation_one_button'] ?? '',
        ];
        $form['banner_block_donation_two'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Donation value 2'),
            '#description' => $this->t('Enter the second donation value.'),
            '#default_value' => $config['banner_block_donation_two'] ?? '',
        ];
        $form['banner_block_donation_two_button'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Donation button text 2'),
            '#default_value' => $config['banner_block_donation_two_button'] ?? '',
        ];
        $form['banner_block_donation_three'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Donation value 3'),
            '#description' => $this->t('Enter the third donation value.'),
            '#default_value' => $config['banner_block_donation_three'] ?? '',
        ];
        $form['banner_block_donation_three_button'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Donation button text 3'),
            '#default_value' => $config['banner_block_donation_three_button'] ?? '',
        ];

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function blockSubmit($form, FormStateInterface $form_state) {
        $this->configuration['banner_block_title'] = $form_state->getValue('banner_block_title');
        $this->configuration['banner_block_body'] = $form_state->getValue('banner_block_body');
        $this->configuration['banner_block_donation_one'] = $form_state->getValue('banner_block_donation_one');
        $this->configuration['banner_block_donation_one_button'] = $form_state->getValue('banner_block_donation_one_button');
        $this->configuration['banner_block_donation_two'] = $form_state->getValue('banner_block_donation_two');
        $this->configuration['banner_block_donation_two_button'] = $form_state->getValue('banner_block_donation_two_button');
        $this->configuration['banner_block_donation_three'] = $form_state->getValue('banner_block_donation_three');
        $this->configuration['banner_block_donation_three_button'] = $form_state->getValue('banner_block_donation_three_button');
    }
}


