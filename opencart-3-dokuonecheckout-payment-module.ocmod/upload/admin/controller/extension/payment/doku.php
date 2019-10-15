<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
class ControllerExtensionPaymentDOKU extends Controller 
{
  private $error = array();

  public function index() {
    $this->load->language('extension/payment/doku');

    $this->document->setTitle($this->language->get('heading_title'));

    $this->load->model('setting/setting');

    if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
      $this->model_setting_setting->editSetting('payment_doku', $this->request->post);

      $this->session->data['success'] = $this->language->get('text_success');

      $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
    }        
        # Get Form Data
        $data['heading_title']                  = $this->language->get('heading_title');
        $data['server_params']                  = $this->language->get('server_params');
        $data['entry_status']                   = $this->language->get('entry_status');
        $data['text_enabled']                   = $this->language->get('text_enabled');
        $data['text_disabled']                  = $this->language->get('text_disabled');
        $data['text_edit']                      = $this->language->get('text_edit');
        $data['url_title']                      = $this->language->get('url_title');
        $data['url_identify']                   = $this->language->get('url_identify');
        $data['url_notify']                     = $this->language->get('url_notify');
        $data['url_redirect']                   = $this->language->get('url_redirect');
        $data['url_review']                     = $this->language->get('url_review');
        $data['button_save']                    = $this->language->get('button_save');
        $data['button_cancel']                  = $this->language->get('button_cancel');
        $data['entry_mallid']                   = $this->language->get('entry_mallid');
        $data['entry_chain']                   = $this->language->get('entry_chain');
        $data['entry_shared']                   = $this->language->get('entry_shared');




        
				# Set Error Message
    if (isset($this->error['warning'])) {
      $data['error_warning'] = $this->error['warning'];
    } else {
      $data['error_warning'] = '';
    }
    if (isset($this->error['companyid'])) {
      $data['error_companyid'] = $this->error['companyid'];
    } else {
      $data['error_companyid'] = '';
    }

    if (isset($this->error['server_set'])) {
      $data['error_server_set'] = $this->error['server_set'];
    } else {
      $data['error_server_set'] = '';
    }
    if (isset($this->error['mallid'])) {
      $data['error_mallid'] = $this->error['mallid'];
    } else {
      $data['error_mallid'] = '';
    }
    if (isset($this->error['chain'])) {
      $data['error_chain'] = $this->error['chain'];
    } else {
      $data['error_chain'] = '';
    }
    if (isset($this->error['shared'])) {
      $data['error_shared'] = $this->error['shared'];
    } else {
      $data['error_shared'] = '';
    }
    if (isset($this->error['doku_name'])) {
      $data['error_doku_name'] = $this->error['doku_name'];
    } else {
      $data['error_doku_name'] = '';
    }



    $data['breadcrumbs'] = array();

    $data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_home'),
      'href'      =>  $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true),
      'separator' => false
    );

    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('text_extension'),
      'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
    );

    $data['breadcrumbs'][] = array(
      'text'      => $this->language->get('heading_title'),
      'href'      => $this->url->link('extension/payment/doku', 'user_token=' . $this->session->data['user_token'], true),
      'separator' => ' :: '
    );

    $data['action'] = $this->url->link('extension/payment/doku', 'user_token=' . $this->session->data['user_token'], true);

    $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token']  . '&type=payment', true);


    if (isset($this->request->post['payment_doku_companyid'])) {
      $data['payment_doku_companyid'] = $this->request->post['payment_doku_companyid'];
    } else {
      $data['payment_doku_companyid'] = $this->config->get('payment_doku_companyid');
    }
    if (isset($this->request->post['payment_doku_server_set'])) {
      $data['payment_doku_server_set'] = $this->request->post['payment_doku_server_set'];
    } else {
      $data['payment_doku_server_set'] = $this->config->get('payment_doku_server_set');
    }
    if (isset($this->request->post['payment_doku_mallid'])) {
      $data['payment_doku_mallid'] = $this->request->post['payment_doku_mallid'];
    } else {
      $data['payment_doku_mallid'] = $this->config->get('payment_doku_mallid');
    }
    if (isset($this->request->post['payment_doku_chain'])) {
      $data['payment_doku_chain'] = $this->request->post['payment_doku_chain'];
    } else {
      $data['payment_doku_chain'] = $this->config->get('payment_doku_chain');
    }
    if (isset($this->request->post['payment_doku_shared'])) {
      $data['payment_doku_shared'] = $this->request->post['payment_doku_shared'];
    } else {
      $data['payment_doku_shared'] = $this->config->get('payment_doku_shared');
    }
    if (isset($this->request->post['payment_doku_review'])) {
      $data['payment_doku_review'] = $this->request->post['payment_doku_review'];
    } else {
      $data['payment_doku_review'] = $this->config->get('payment_doku_review');
    }
    if (isset($this->request->post['payment_doku_identify'])) {
      $data['payment_doku_identify'] = $this->request->post['payment_doku_identify'];
    } else {
      $data['payment_doku_identify'] = $this->config->get('payment_doku_identify');
    }
    if (isset($this->request->post['payment_doku_tokenization'])) {
      $data['payment_doku_tokenization'] = $this->request->post['payment_doku_tokenization'];
    } else {
      $data['payment_doku_tokenization'] = $this->config->get('payment_doku_tokenization');
    }
    if (isset($this->request->post['payment_doku_geo_zone_id'])) {
      $data['payment_doku_geo_zone_id'] = $this->request->post['payment_doku_geo_zone_id'];
    } else {
      $data['payment_doku_geo_zone_id'] = $this->config->get('payment_doku_geo_zone_id');
    }
    if (isset($this->request->post['payment_doku_name'])) {
      $data['payment_doku_name'] = $this->request->post['payment_doku_name'];
    } else {
      $data['payment_doku_name'] = $this->config->get('payment_doku_name');
    }
    if (isset($this->request->post['payment_doku_channel_select'])) {
      $data['payment_doku_channel_select'] = $this->request->post['payment_doku_channel_select'];
    } else {
      $data['payment_doku_channel_select'] = $this->config->get('payment_doku_channel_select');
    }
    if (isset($this->request->post['payment_doku_channel_list'])) {
      $data['payment_doku_channel_list'] = $this->request->post['payment_doku_channel_list'];
    } else {
      $data['payment_doku_channel_list'] = $this->config->get('payment_doku_channel_list');
    }
    if (isset($this->request->post['payment_doku_channel_name_list'])) {
      $data['payment_doku_channel_name_list'] = $this->request->post['payment_doku_channel_name_list'];
    } else {
      $data['payment_doku_channel_name_list'] = $this->config->get('payment_doku_channel_name_list');
    }
    if (isset($this->request->post['payment_doku_bin_list'])) {
      $data['payment_doku_bin_list'] = $this->request->post['payment_doku_bin_list'];
    } else {
      $data['payment_doku_bin_list'] = $this->config->get('payment_doku_bin_list');
    }
    if (isset($this->request->post['payment_doku_mallid_KlikpayBCA'])) {
      $data['payment_doku_mallid_KlikpayBCA'] = $this->request->post['payment_doku_mallid_KlikpayBCA'];
    } else {
      $data['payment_doku_mallid_KlikpayBCA'] = $this->config->get('payment_doku_mallid_KlikpayBCA');
    }
    if (isset($this->request->post['payment_doku_chain_KlikpayBCA'])) {
      $data['payment_doku_chain_KlikpayBCA'] = $this->request->post['payment_doku_chain_KlikpayBCA'];
    } else {
      $data['payment_doku_chain_KlikpayBCA'] = $this->config->get('payment_doku_chain_KlikpayBCA');
    }
    if (isset($this->request->post['payment_doku_shared_KlikpayBCA'])) {
      $data['payment_doku_shared_KlikpayBCA'] = $this->request->post['payment_doku_shared_KlikpayBCA'];
    } else {
      $data['payment_doku_shared_KlikpayBCA'] = $this->config->get('payment_doku_shared_KlikpayBCA');
    }
    if (isset($this->request->post['payment_doku_mallid_kredivo'])) {
      $data['payment_doku_mallid_kredivo'] = $this->request->post['payment_doku_mallid_kredivo'];
    } else {
      $data['payment_doku_mallid_kredivo'] = $this->config->get('payment_doku_mallid_kredivo');
    }
    if (isset($this->request->post['payment_doku_chain_kredivo'])) {
      $data['payment_doku_chain_kredivo'] = $this->request->post['payment_doku_chain_kredivo'];
    } else {
      $data['payment_doku_chain_kredivo'] = $this->config->get('payment_doku_chain_kredivo');
    }
    if (isset($this->request->post['payment_doku_shared_kredivo'])) {
      $data['payment_doku_shared_kredivo'] = $this->request->post['payment_doku_shared_kredivo'];
    } else {
      $data['payment_doku_shared_kredivo'] = $this->config->get('payment_doku_shared_kredivo');
    }
    if (isset($this->request->post['payment_doku_mallid_va_bni'])) {
      $data['payment_doku_mallid_va_bni'] = $this->request->post['payment_doku_mallid_va_bni'];
    } else {
      $data['payment_doku_mallid_va_bni'] = $this->config->get('payment_doku_mallid_va_bni');
    }
    if (isset($this->request->post['payment_doku_chain_va_bni'])) {
      $data['payment_doku_chain_va_bni'] = $this->request->post['payment_doku_chain_va_bni'];
    } else {
      $data['payment_doku_chain_va_bni'] = $this->config->get('payment_doku_chain_va_bni');
    }
    if (isset($this->request->post['payment_doku_shared_va_bni'])) {
      $data['payment_doku_shared_va_bni'] = $this->request->post['payment_doku_shared_va_bni'];
    } else {
      $data['payment_doku_shared_va_bni'] = $this->config->get('payment_doku_shared_va_bni');
    }
    if (isset($this->request->post['payment_doku_mallid_va_sinarmas'])) {
      $data['payment_doku_mallid_va_sinarmas'] = $this->request->post['payment_doku_mallid_va_sinarmas'];
    } else {
      $data['payment_doku_mallid_va_sinarmas'] = $this->config->get('payment_doku_mallid_va_sinarmas');
    }
    if (isset($this->request->post['payment_doku_chain_va_sinarmas'])) {
      $data['payment_doku_chain_va_sinarmas'] = $this->request->post['payment_doku_chain_va_sinarmas'];
    } else {
      $data['payment_doku_chain_va_sinarmas'] = $this->config->get('payment_doku_chain_va_sinarmas');
    }
    if (isset($this->request->post['payment_doku_shared_va_sinarmas'])) {
      $data['payment_doku_shared_va_sinarmas'] = $this->request->post['payment_doku_shared_va_sinarmas'];
    } else {
      $data['payment_doku_shared_va_sinarmas'] = $this->config->get('payment_doku_shared_va_sinarmas');
    }
    if (isset($this->request->post['payment_doku_installment'])) {
      $data['payment_doku_installment'] = $this->request->post['payment_doku_installment'];
    } else {
      $data['payment_doku_installment'] = $this->config->get('payment_doku_installment');
    }
    if (isset($this->request->post['payment_doku_installment_status'])) {
      $data['payment_doku_installment_status'] = $this->request->post['payment_doku_installment_status'];
    } else {
      $data['payment_doku_installment_status'] = $this->config->get('payment_doku_installment_status');
    }
    if (isset($this->request->post['payment_doku_installment_minimum'])) {
      $data['payment_doku_installment_minimum'] = $this->request->post['payment_doku_installment_minimum'];
    } else {
      $data['payment_doku_installment_minimum'] = $this->config->get('payment_doku_installment_minimum');
    }
    if (isset($this->request->post['payment_doku_channel_categori'])) {
      $data['payment_doku_channel_categori'] = $this->request->post['payment_doku_channel_categori'];
    } else {
      $data['payment_doku_channel_categori'] = $this->config->get('payment_doku_channel_categori');
    }


        $this->load->model('localisation/geo_zone');                    
        $data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();               


		
        $this->load->model('localisation/order_status');		
        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
        		
    if (isset($this->request->post['payment_doku_status'])) {
      $data['payment_doku_status'] = $this->request->post['payment_doku_status'];
    } else {
      $data['payment_doku_status'] = $this->config->get('payment_doku_status');
    }
    if (isset($this->request->post['payment_doku_sort_order'])) {
      $data['payment_doku_sort_order'] = $this->request->post['payment_doku_sort_order'];
    } else {
      $data['payment_doku_sort_order'] = $this->config->get('payment_doku_sort_order');
    }   

    $data['user_token'] = $this->session->data['user_token'];

    $data['header'] = $this->load->controller('common/header');
    $data['column_left'] = $this->load->controller('common/column_left');
    $data['footer'] = $this->load->controller('common/footer');

    $this->response->setOutput($this->load->view('extension/payment/doku', $data));

				
		}

    public function install() {
    $this->load->model('extension/payment/doku');
    $this->model_extension_payment_doku->install();
    }

    public function uninstall() {
    $this->load->model('extension/payment/doku');
    $this->model_extension_payment_doku->uninstall();
    }

    private function validate()
    {
    if (!$this->user->hasPermission('modify', 'extension/payment/doku')) {
      $this->error['warning'] = $this->language->get('error_permission');
    }

    if (!$this->request->post['payment_doku_companyid']) {
      $this->error['companyid'] = $this->language->get('error_companyid');
    }
    if (!$this->request->post['payment_doku_mallid']) {
      $this->error['mallid'] = $this->language->get('error_mallid');
    }
    if (!$this->request->post['payment_doku_chain']) {
      $this->error['chain'] = $this->language->get('error_chain');
    }
    if (!$this->request->post['payment_doku_shared']) {
      $this->error['shared'] = $this->language->get('error_shared');
    }
    if (!$this->request->post['payment_doku_name']) {
      $this->error['doku_name'] = $this->language->get('error_doku_name');
    }

	
    return !$this->error;
    }		


}
