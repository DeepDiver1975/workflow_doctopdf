<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

use OCA\Workflow\PublicAPI\Event\CollectTypesInterface;
use OCA\Workflow\PublicAPI\Event\FileActionInterface;

\OC::$server->getEventDispatcher()->addListener('OCA\Workflow\Engine::' . FileActionInterface::FILE_CREATE, function(FileActionInterface $event) {
	$app = new \OCP\AppFramework\App('workflow_doctopdf');
	/** @var \OCA\Workflow_DocToPdf\ConverterPlugin $plugin */
	$plugin = $app->getContainer()->query('OCA\Workflow_DocToPdf\ConverterPlugin');
	$plugin->listen($event);
});

\OC::$server->getEventDispatcher()->addListener('OCA\Workflow\Engine::' . FileActionInterface::FILE_UPDATE, function(FileActionInterface $event) {
	$app = new \OCP\AppFramework\App('workflow_doctopdf');
	/** @var \OCA\Workflow_DocToPdf\ConverterPlugin $plugin */
	$plugin = $app->getContainer()->query('OCA\Workflow_DocToPdf\ConverterPlugin');
	$plugin->listen($event);
});

\OC::$server->getEventDispatcher()->addListener('OCA\Workflow\Engine::' . CollectTypesInterface::TYPES_COLLECT, function(CollectTypesInterface $event) {
	$app = new \OCP\AppFramework\App('workflow_doctopdf');
	/** @var \OCA\Workflow_DocToPdf\ConverterPlugin $plugin */
	$plugin = $app->getContainer()->query('OCA\Workflow_DocToPdf\ConverterPlugin');
	$plugin->collectTypes($event);
});

\OC::$server->getEventDispatcher()->addListener('OC\Settings\Admin::loadAdditionalScripts', function() {
	\OCP\Util::addScript('workflow_doctopdf', 'converterplugin');
});
