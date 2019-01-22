<?php

namespace srag\Plugins\SrTile\Tile;

use ilObjectFactory;
use ilSrTilePlugin;
use srag\DIC\SrTile\DICTrait;
use srag\Plugins\Notifications4Plugins\Notification\srNotification;
use srag\Plugins\SrTile\Utils\SrTileTrait;
use Throwable;

/**
 * Class Tiles
 *
 * @package srag\Plugins\SrTile\Tile
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Tiles {

	use DICTrait;
	use SrTileTrait;
	const PLUGIN_CLASS_NAME = ilSrTilePlugin::class;
	const GET_PARAM_REF_ID = "ref_id";
	const GET_PARAM_TARGET = "target";
	/**
	 * @var self
	 */
	protected static $instance = NULL;


	/**
	 * @return self
	 */
	public static function getInstance(): self {
		if (self::$instance === NULL) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * @var Tile[]
	 */
	protected static $instances_by_ref_id = [];
	/**
	 * @var Tile[]
	 */
	protected static $parent_tile_cache = [];
	/**
	 * @var bool[]
	 */
	protected static $is_object_cache = [];
	/**
	 * @var bool[]
	 */
	protected static $is_top_tile_cache = [];


	/**
	 * Tiles constructor
	 */
	private function __construct() {

	}


	/**
	 * @return int|null
	 */
	public function filterRefId()/*: ?int*/ {
		$obj_ref_id = filter_input(INPUT_GET, self::GET_PARAM_REF_ID);

		if ($obj_ref_id === NULL) {
			$param_target = filter_input(INPUT_GET, self::GET_PARAM_TARGET);

			$obj_ref_id = explode('_', $param_target)[1];
		}

		$obj_ref_id = intval($obj_ref_id);

		if ($obj_ref_id > 0) {
			return $obj_ref_id;
		} else {
			return NULL;
		}
	}


	/**
	 * @param int|null $obj_ref_id
	 * @param bool     $store
	 *
	 * @return Tile
	 */
	public function getInstanceForObjRefId(int $obj_ref_id = NULL, $store = true): Tile {
		if (!isset(self::$instances_by_ref_id[$obj_ref_id])) {
			$tile = Tile::where([ 'obj_ref_id' => $obj_ref_id ])->first();

			if ($tile === NULL) {
				$tile = new Tile();

				if ($store) {
					if ($this->isObject($obj_ref_id)) {
						$tile->setObjRefId($obj_ref_id);

						$tile->store();
					}
				} else {
					return $tile;
				}
			}

			self::$instances_by_ref_id[$obj_ref_id] = $tile;
		}

		return self::$instances_by_ref_id[$obj_ref_id];
	}


	/**
	 * @return array
	 */
	public function getMailTemplatesText(): array {
		if (file_exists(__DIR__ . "/../../../Notifications4Plugins/vendor/autoload.php")) {
			/**
			 * @var srNotification[] $notifications
			 */
			$notifications = srNotification::get();

			$mail_templates = [];

			foreach ($notifications as $notification) {
				$mail_templates[$notification->getName()] = $notification->getTitle() . " (" . $notification->getName() . ")";
			}

			return $mail_templates;
		} else {
			return [];
		}
	}


	/**
	 * @param Tile $tile
	 *
	 * @return Tile|null
	 */
	public function getParentTile(Tile $tile)/*:?Tile*/ {
		if (!isset(self::$parent_tile_cache[$tile->getObjRefId()])) {
			try {
				self::$parent_tile_cache[$tile->getObjRefId()] = $this->getInstanceForObjRefId(self::dic()->tree()
					->getParentId($tile->getObjRefId()));
			} catch (Throwable $ex) {
				// Fix No node_id given!
				self::$parent_tile_cache[$tile->getObjRefId()] = NULL;
			}
		}

		return self::$parent_tile_cache[$tile->getObjRefId()];
	}


	/**
	 * @param int|null $obj_ref_id
	 *
	 * @return bool
	 */
	public function isObject(/*?*/
		int $obj_ref_id = NULL): bool {
		if (!isset(self::$is_object_cache[$obj_ref_id])) {
			self::$is_object_cache[$obj_ref_id] = ($obj_ref_id !== NULL && $obj_ref_id > 0 && $obj_ref_id !== intval(SYSTEM_FOLDER_ID)
				&& ($obj_ref_id === intval(ROOT_FOLDER_ID) || ilObjectFactory::getInstanceByRefId($obj_ref_id, false) !== false));
		}

		return self::$is_object_cache[$obj_ref_id];
	}


	/**
	 * @param Tile $tile
	 *
	 * @return bool
	 */
	public function isTopTile(Tile $tile): bool {
		if (!isset(self::$is_top_tile_cache[$tile->getTileId()])) {
			$parent_tile = $this->getParentTile($tile);

			if ($parent_tile !== NULL) {
				self::$is_top_tile_cache[$tile->getTileId()] = (!$this->isObject($parent_tile->getObjRefId()));
			} else {
				self::$is_top_tile_cache[$tile->getTileId()] = true;
			}
		}

		return self::$is_top_tile_cache[$tile->getTileId()];
	}
}