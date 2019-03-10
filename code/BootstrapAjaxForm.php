<?php

class BootstrapAjaxForm extends BootstrapForm {

	
	/**
	 * Taking care of that AJAX responses are handled accoring to the specs:
	 * a json object with "valid, msg, html"
	 * This needs to be called as a JSON requst
	 * @return \SS_HTTPResponse
	 */
	protected function getValidationErrorResponse() {
		$request = $this->getRequest();
		if($request->isAjax()) {
			$acceptType = $request->getHeader('Accept');
			if(strpos($acceptType, 'application/json') !== FALSE) {
				$this->setupFormErrors();
				$ajaxData = array(
					'valid' => false,
					'msg' => _t('BootstrapAjaxForm.ERROR',
						"You've got errors in your submission. Please correct these."),
					'html' => $this->forTemplate()->RAW()
				);
				$response = new SS_HTTPResponse(json_encode($ajaxData));
				$response->addHeader("Content-type", "application/json");
				return $response;
			} else {
				return parent::getValidationErrorResponse();
			}
		} else {
			return parent::getValidationErrorResponse();
		}
	}		
	
}
