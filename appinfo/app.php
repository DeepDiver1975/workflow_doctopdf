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

\OC::$server->getEventDispatcher()->addListener('OCA\Workflow\Engine::createFile', function(\OCA\Workflow\Engine\Event\FileAction $event) {
	$app = new \OCP\AppFramework\App('workflow_doctopdf');
	/** @var \OCA\Workflow_DocToPdf\ConverterPlugin $plugin */
	$plugin = $app->getContainer()->query('OCA\Workflow_DocToPdf\ConverterPlugin');
	$plugin->listen($event);
});

\OC::$server->getEventDispatcher()->addListener('OCA\Workflow\Engine::updateFile', function(\OCA\Workflow\Engine\Event\FileAction $event) {
	$app = new \OCP\AppFramework\App('workflow_doctopdf');
	/** @var \OCA\Workflow_DocToPdf\ConverterPlugin $plugin */
	$plugin = $app->getContainer()->query('OCA\Workflow_DocToPdf\ConverterPlugin');
	$plugin->listen($event);
});
