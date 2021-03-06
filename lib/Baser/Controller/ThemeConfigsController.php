<?php

/* SVN FILE: $Id$ */
/**
 * テーマ設定コントローラー
 *
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2013, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2013, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.Controller
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */

/**
 * テーマ設定コントローラー
 *
 * @package Baser.Controller
 */
class ThemeConfigsController extends AppController {

/**
 * クラス名
 *
 * @var string
 * @access public
 */
	public $name = 'ThemeConfigs';

/**
 * モデル
 *
 * @var array
 * @access public
 */
	public $uses = array('ThemeConfig');

/**
 * コンポーネント
 *
 * @var array
 * @access public
 */
	public $components = array('BcAuth', 'Cookie', 'BcAuthConfigure');

/**
 * サブメニューエレメント
 *
 * @var array
 * @access public
 */
	public $subMenuElements = array('themes');

/**
 * ぱんくずナビ
 *
 * @var array
 * @access public
 */
	public $crumbs = array(
		array('name' => 'テーマ管理', 'url' => array('controller' => 'themes', 'action' => 'index'))
	);

/**
 * [ADMIN] 設定編集
 */
	public function admin_form() {
		$this->pageTitle = 'テーマ設定';
		$this->help = 'theme_configs_form';

		if (empty($this->request->data)) {
			$this->request->data = array('ThemeConfig' => $this->ThemeConfig->findExpanded());
		} else {

			$this->ThemeConfig->set($this->request->data);
			if (!$this->ThemeConfig->validates()) {
				$this->setMessage('入力エラーです。内容を修正してください。', true);
			} else {
				$this->ThemeConfig->updateColorConfig($this->request->data);
				$data = $this->ThemeConfig->saveImage($this->request->data);
				$data = $this->ThemeConfig->deleteImage($data);
				if ($this->ThemeConfig->saveKeyValue($data)) {
					clearViewCache();
					$this->setMessage('システム設定を保存しました。');
					$this->redirect('form');
				} else {
					$this->setMessage('保存中にエラーが発生しました。', true);
				}
			}
		}
	}

}
