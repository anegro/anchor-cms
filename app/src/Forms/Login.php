<?php

namespace Forms;

class Login extends Form implements ValidatableInterface {

	public function init() {
		$this->addElement(new \Forms\Elements\Hidden('token'));

		$this->addElement(new \Forms\Elements\Input('username', [
			'label' => 'Username',
			'attributes' => [
				'autofocus' => 'true',
				'placeholder' => 'Username',
			],
		]));

		$this->addElement(new \Forms\Elements\Password('password', [
			'label' => 'Password',
			'attributes' => [
				'placeholder' => 'Password',
			],
		]));

		$this->addElement(new \Forms\Elements\Submit('submit', [
			'value' => 'Login',
			'attributes' => [
				'class' => 'button',
			],
		]));
	}

	public function getFilters() {
		return filter_input_array(INPUT_POST, [
			'token' => FILTER_SANITIZE_STRING,
			'username' => FILTER_SANITIZE_STRING,
			'password' => FILTER_UNSAFE_RAW,
		]);
	}

	public function getRules() {
		return [
			'token' => ['required'],
			'username' => ['required'],
			'password' => ['required'],
		];
	}

}
