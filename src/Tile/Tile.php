<?php

namespace srag\Plugins\SrTile\Tile;

use ActiveRecord;
use arConnector;
use ilSrTilePlugin;
use srag\DIC\SrTile\DICTrait;
use srag\Plugins\SrTile\Utils\SrTileTrait;

/**
 * Class Tile
 *
 * @package srag\Plugins\SrTile\Tile
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class Tile extends ActiveRecord {

	use DICTrait;
	use SrTileTrait;
	const TABLE_NAME = "ui_uihk_srtile_tile";
	const PLUGIN_CLASS_NAME = ilSrTilePlugin::class;
	const COLOR_TYPE_SET = 1;
	const COLOR_TYPE_CONTRAST = 2;
	const COLOR_TYPE_BACKGROUND = 3;
	const COLOR_TYPE_AUTO_FROM_IMAGE = 4;
	const COLOR_TYPE_PARENT = 5;
	const SIZE_TYPE_SET = 1;
	const SIZE_TYPE_PARENT = 2;
	const POSITION_TOP = 1;
	const POSITION_BOTTOM = 2;
	const POSITION_LEFT = 3;
	const POSITION_RIGHT = 4;
	const POSITION_LEFT_TOP = 5;
	const POSITION_LEFT_BOTTOM = 6;
	const POSITION_RIGHT_TOP = 7;
	const POSITION_RIGHT_BOTTOM = 8;
	const POSITION_NONE = 9;
	const POSITION_PARENT = 10;
	const HORIZONTAL_ALIGN_LEFT = 1;
	const HORIZONTAL_ALIGN_CENTER = 2;
	const HORIZONTAL_ALIGN_RIGHT = 3;
	const HORIZONTAL_ALIGN_PARENT = 4;
	const VERTICAL_ALIGN_TOP = 1;
	const VERTICAL_ALIGN_CENTER = 2;
	const VERTICAL_ALIGN_BOTTOM = 3;
	const VERTICAL_ALIGN_PARENT = 4;
	const SHOW_FALSE = 1;
	const SHOW_TRUE = 2;
	const SHOW_PARENT = 3;
	const MAIL_TEMPLATE_SET = 1;
	const MAIL_TEMPLATE_PARENT = 2;
	const LEARNING_PROGRESS_ICON = 1;
	const LEARNING_PROGRESS_BAR = 2;
	const LEARNING_PROGRESS_NONE = 3;
	const LEARNING_PROGRESS_PARENT = 4;
	const OPEN_FALSE = 1;
	const OPEN_TRUE = 2;
	const OPEN_PARENT = 3;
	const DEFAULT_ACTIONS_POSITION = self::POSITION_RIGHT;
	const DEFAULT_ACTIONS_VERTICAL_ALIGN = self::VERTICAL_ALIGN_BOTTOM;
	const DEFAULT_BACKGROUND_COLOR_TYPE = self::COLOR_TYPE_SET;
	const DEFAULT_BORDER_SIZE = 0;
	const DEFAULT_BORDER_SIZE_TYPE = self::SIZE_TYPE_SET;
	const DEFAULT_BORDER_COLOR_TYPE = self::COLOR_TYPE_BACKGROUND;
	const DEFAULT_ENABLE_RATING = Tile::SHOW_FALSE;
	const DEFAULT_FONT_COLOR_TYPE = self::COLOR_TYPE_CONTRAST;
	const DEFAULT_FONT_SIZE = 16;
	const DEFAULT_FONT_SIZE_TYPE = self::SIZE_TYPE_SET;
	const DEFAULT_IMAGE_POSITION = self::POSITION_TOP;
	const DEFAULT_LABEL_HORIZONTAL_ALIGN = self::HORIZONTAL_ALIGN_LEFT;
	const DEFAULT_LABEL_VERTICAL_ALIGN = self::VERTICAL_ALIGN_TOP;
	const DEFAULT_LEARNING_PROGRESS_POSITION = Tile::POSITION_LEFT_TOP;
	const DEFAULT_MARGIN = 10;
	const DEFAULT_MARGIN_TYPE = self::SIZE_TYPE_SET;
	const DEFAULT_OBJECT_ICON_POSITION = Tile::POSITION_LEFT_BOTTOM;
	const DEFAULT_OPEN_OBJ_WITH_ONE_CHILD_DIRECT = Tile::OPEN_FALSE;
	const DEFAULT_RECOMMENDATION_MAIL_TEMPLATE_TYPE = Tile::MAIL_TEMPLATE_SET;
	const DEFAULT_SHOW_ACTIONS = Tile::SHOW_TRUE;
	const DEFAULT_SHOW_DOWNLOAD_CERTIFICATE = Tile::SHOW_FALSE;
	const DEFAULT_SHOW_FAVORITES_ICON = Tile::SHOW_TRUE;
	const DEFAULT_SHOW_IMAGE_AS_BACKGROUND = Tile::SHOW_FALSE;
	const DEFAULT_SHOW_LEARNING_PROGRESS = Tile::LEARNING_PROGRESS_NONE;
	const DEFAULT_SHOW_LEARNING_PROGRESS_LEGEND = Tile::SHOW_FALSE;
	const DEFAULT_SHOW_LIKES_COUNT = Tile::SHOW_FALSE;
	const DEFAULT_SHOW_PRECONDITIONS = Tile::SHOW_FALSE;
	const DEFAULT_SHOW_RECOMMEND_ICON = Tile::SHOW_FALSE;
	const DEFAULT_SHOW_OBJECT_TABS = Tile::SHOW_TRUE;
	const DEFAULT_SHOW_TITLE = Tile::SHOW_TRUE;
	/**
	 * @var int
	 *
	 * @con_has_field    true
	 * @con_fieldtype    integer
	 * @con_length       8
	 * @con_is_notnull   true
	 * @con_is_primary   true
	 * @con_sequence     true
	 */
	protected $tile_id;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_length      8
	 * @con_is_notnull  true
	 */
	protected $obj_ref_id;
	/**
	 * @var bool
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_length      1
	 * @con_is_notnull  true
	 */
	protected $tile_enabled = false;
	/**
	 * @var bool
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_length      1
	 * @con_is_notnull  true
	 */
	protected $tile_enabled_children = false;
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_length      256
	 * @con_is_notnull  true
	 */
	protected $image = "";
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $background_color_type = self::COLOR_TYPE_PARENT;
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $background_color = "";
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $font_color_type = self::COLOR_TYPE_PARENT;
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $font_color = "";
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $margin_type = self::SIZE_TYPE_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $margin = 0;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $font_size_type = self::SIZE_TYPE_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $font_size = 0;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $image_position = self::POSITION_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $label_horizontal_align = self::HORIZONTAL_ALIGN_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $label_vertical_align = self::VERTICAL_ALIGN_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $actions_position = self::POSITION_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $actions_vertical_align = self::VERTICAL_ALIGN_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $object_icon_position = self::POSITION_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $show_favorites_icon = self::SHOW_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $show_actions = self::SHOW_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $show_title = self::SHOW_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $enable_rating = self::SHOW_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $show_likes_count = self::SHOW_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $show_recommend_icon = self::SHOW_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $recommend_mail_template_type = self::MAIL_TEMPLATE_PARENT;
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $recommend_mail_template = "";
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $show_learning_progress = self::LEARNING_PROGRESS_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $learning_progress_position = self::POSITION_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $show_learning_progress_legend = self::SHOW_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $border_size_type = self::SIZE_TYPE_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $border_size = 0;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $border_color_type = self::COLOR_TYPE_PARENT;
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $border_color = "";
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $open_obj_with_one_child_direct = self::OPEN_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $show_image_as_background = self::SHOW_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $show_preconditions = self::SHOW_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $show_download_certificate = self::SHOW_PARENT;
	/**
	 * @var int
	 *
	 * @con_has_field   true
	 * @con_fieldtype   integer
	 * @con_is_notnull  true
	 */
	protected $show_object_tabs = self::SHOW_PARENT;
	/**
	 * @var TileProperties|null
	 */
	protected $properties = NULL;


	/**
	 * Tile constructor
	 *
	 * @param int              $primary_key_value
	 * @param arConnector|null $connector
	 */
	public function __construct(/*int*/
		$primary_key_value = 0, arConnector $connector = NULL) {
		parent::__construct($primary_key_value, $connector);
	}


	/**
	 * @return string
	 */
	public function getConnectorContainerName(): string {
		return self::TABLE_NAME;
	}


	/**
	 * @param string $field_name
	 *
	 * @return mixed|null
	 */
	public function sleep(/*string*/
		$field_name) {
		$field_value = $this->{$field_name};

		switch ($field_name) {
			case "tile_enabled":
			case "tile_enabled_children":
				return ($field_value ? 1 : 0);

			default:
				return NULL;
		}
	}


	/**
	 * @param string $field_name
	 * @param mixed  $field_value
	 *
	 * @return mixed|null
	 */
	public function wakeUp(/*string*/
		$field_name, $field_value) {
		switch ($field_name) {
			case "actions_position":
			case "actions_vertical_align":
			case "background_color_type":
			case "border_color_type":
			case "border_size":
			case "border_size_type":
			case "enable_rating":
			case "font_color_type":
			case "font_size":
			case "font_size_type":
			case "image_position":
			case "label_horizontal_align":
			case "label_vertical_align":
			case "learning_progress_position":
			case "margin":
			case "margin_type":
			case "object_icon_position":
			case "obj_ref_id":
			case "open_obj_with_one_child_direct":
			case "recommend_mail_template_type":
			case "show_actions":
			case "show_download_certificate":
			case "show_favorites_icon":
			case "show_image_as_background":
			case "show_likes_count":
			case "show_learning_progress":
			case "show_learning_progress_legend":
			case "show_object_tabs":
			case "show_preconditions":
			case "show_recommend_icon":
			case "show_title":
			case "tile_id":
				return intval($field_value);

			case "tile_enabled":
			case "tile_enabled_children":
				return boolval($field_value);

			default:
				return NULL;
		}
	}


	/**
	 * @return int
	 */
	public function getTileId(): int {
		return $this->tile_id;
	}


	/**
	 * @param int $tile_id
	 */
	public function setTileId(int $tile_id)/*: void*/ {
		$this->tile_id = $tile_id;
	}


	/**
	 * @return int
	 */
	public function getObjRefId() {
		return $this->obj_ref_id;
	}


	/**
	 * @param int $obj_ref_id
	 */
	public function setObjRefId(int $obj_ref_id)/*: void*/ {
		$this->obj_ref_id = $obj_ref_id;
	}


	/**
	 * @return bool
	 */
	public function isTileEnabled(): bool {
		if (self::tiles()->isTopTile($this)) {
			return false;
		}

		if ($this->tile_enabled) {
			return true;
		}

		$parent_tile = self::tiles()->getParentTile($this);

		if ($parent_tile !== NULL) {
			return $parent_tile->isTileEnabledChildren();
		} else {
			return false;
		}
	}


	/**
	 * @param bool $tile_enabled
	 */
	public function setTileEnabled(bool $tile_enabled)/*: void*/ {
		$this->tile_enabled = $tile_enabled;
	}


	/**
	 * @return bool
	 */
	public function isTileEnabledChildren(): bool {
		return $this->tile_enabled_children;
	}


	/**
	 * @param bool $tile_enabled_children
	 */
	public function setTileEnabledChildren(bool $tile_enabled_children)/*: void*/ {
		$this->tile_enabled_children = $tile_enabled_children;
	}


	/**
	 * @return string
	 *
	 * @internal
	 *
	 */
	public function getImage(): string {
		return $this->image;
	}


	/**
	 * @param string $image
	 */
	public function setImage(string $image)/*: void*/ {
		$this->image = $image;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getBackgroundColorType(): int {
		return $this->background_color_type;
	}


	/**
	 * @param int $background_color_type
	 */
	public function setBackgroundColorType(int $background_color_type)/*: void*/ {
		$this->background_color_type = $background_color_type;
	}


	/**
	 * @return string
	 *
	 * @internal
	 */
	public function getBackgroundColor(): string {
		return $this->background_color;
	}


	/**
	 * @param string $background_color
	 */
	public function setBackgroundColor(string $background_color)/*: void*/ {
		$this->background_color = $background_color;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getFontColorType(): int {
		return $this->font_color_type;
	}


	/**
	 * @param int $font_color_type
	 */
	public function setFontColorType(int $font_color_type)/*: void*/ {
		$this->font_color_type = $font_color_type;
	}


	/**
	 * @return string
	 *
	 * @internal
	 */
	public function getFontColor(): string {
		return $this->font_color;
	}


	/**
	 * @param string $font_color
	 */
	public function setFontColor(string $font_color)/*: void*/ {
		$this->font_color = $font_color;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getMarginType(): int {
		return $this->margin_type;
	}


	/**
	 * @param int $margin_type
	 */
	public function setMarginType(int $margin_type)/*: void*/ {
		$this->margin_type = $margin_type;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getMargin(): int {
		return $this->margin;
	}


	/**
	 * @param int $margin
	 */
	public function setMargin(int $margin)/*: void*/ {
		$this->margin = $margin;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getFontSizeType(): int {
		return $this->font_size_type;
	}


	/**
	 * @param int $font_size_type
	 */
	public function setFontSizeType(int $font_size_type)/*: void*/ {
		$this->font_size_type = $font_size_type;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getFontSize(): int {
		return $this->font_size;
	}


	/**
	 * @param int $font_size
	 */
	public function setFontSize(int $font_size)/*: void*/ {
		$this->font_size = $font_size;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getImagePosition(): int {
		return $this->image_position;
	}


	/**
	 * @param int $image_position
	 */
	public function setImagePosition(int $image_position)/*: void*/ {
		$this->image_position = $image_position;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getLabelHorizontalAlign(): int {
		return $this->label_horizontal_align;
	}


	/**
	 * @param int $label_horizontal_align
	 */
	public function setLabelHorizontalAlign(int $label_horizontal_align)/*: void*/ {
		$this->label_horizontal_align = $label_horizontal_align;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getLabelVerticalAlign(): int {
		return $this->label_vertical_align;
	}


	/**
	 * @param int $label_vertical_align
	 */
	public function setLabelVerticalAlign(int $label_vertical_align)/*: void*/ {
		$this->label_vertical_align = $label_vertical_align;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getActionsPosition(): int {
		return $this->actions_position;
	}


	/**
	 * @param int $actions_position
	 */
	public function setActionsPosition(int $actions_position)/*: void*/ {
		$this->actions_position = $actions_position;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getActionsVerticalAlign(): int {
		return $this->actions_vertical_align;
	}


	/**
	 * @param int $actions_vertical_align
	 */
	public function setActionsVerticalAlign(int $actions_vertical_align)/*: void*/ {
		$this->actions_vertical_align = $actions_vertical_align;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getObjectIconPosition(): int {
		return $this->object_icon_position;
	}


	/**
	 * @param int $object_icon_position
	 */
	public function setObjectIconPosition(int $object_icon_position)/*: void*/ {
		$this->object_icon_position = $object_icon_position;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getShowFavoritesIcon(): int {
		return $this->show_favorites_icon;
	}


	/**
	 * @param int $show_favorites_icon
	 */
	public function setShowFavoritesIcon(int $show_favorites_icon)/*: void*/ {
		$this->show_favorites_icon = $show_favorites_icon;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getShowActions(): int {
		return $this->show_actions;
	}


	/**
	 * @param int $show_actions
	 */
	public function setShowActions(int $show_actions)/*: void*/ {
		$this->show_actions = $show_actions;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getShowTitle(): int {
		return $this->show_title;
	}


	/**
	 * @param int $show_title
	 */
	public function setShowTitle(int $show_title)/*: void*/ {
		$this->show_title = $show_title;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getEnableRating(): int {
		return $this->enable_rating;
	}


	/**
	 * @param int $enable_rating
	 */
	public function setEnableRating(int $enable_rating)/*: void*/ {
		$this->enable_rating = $enable_rating;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getShowLikesCount(): int {
		return $this->show_likes_count;
	}


	/**
	 * @param int $show_likes_count
	 */
	public function setShowLikesCount(int $show_likes_count)/*: void*/ {
		$this->show_likes_count = $show_likes_count;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getShowRecommendIcon(): int {
		return $this->show_recommend_icon;
	}


	/**
	 * @param int $show_recommend_icon
	 */
	public function setShowRecommendIcon(int $show_recommend_icon)/*: void*/ {
		$this->show_recommend_icon = $show_recommend_icon;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getRecommendMailTemplateType(): int {
		return $this->recommend_mail_template_type;
	}


	/**
	 * @param int $recommend_mail_template_type
	 */
	public function setRecommendMailTemplateType(int $recommend_mail_template_type)/*: void*/ {
		$this->recommend_mail_template_type = $recommend_mail_template_type;
	}


	/**
	 * @return string
	 *
	 * @internal
	 */
	public function getRecommendMailTemplate(): string {
		return $this->recommend_mail_template;
	}


	/**
	 * @param string $recommend_mail_template
	 */
	public function setRecommendMailTemplate(string $recommend_mail_template)/*: void*/ {
		$this->recommend_mail_template = $recommend_mail_template;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getShowLearningProgress(): int {
		return $this->show_learning_progress;
	}


	/**
	 * @param int $show_learning_progress
	 */
	public function setShowLearningProgress(int $show_learning_progress)/*: void*/ {
		$this->show_learning_progress = $show_learning_progress;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getLearningProgressPosition(): int {
		return $this->learning_progress_position;
	}


	/**
	 * @param int $learning_progress_position
	 */
	public function setLearningProgressPosition(int $learning_progress_position)/*: void*/ {
		$this->learning_progress_position = $learning_progress_position;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getShowLearningProgressLegend(): int {
		return $this->show_learning_progress_legend;
	}


	/**
	 * @param int $show_learning_progress_legend
	 */
	public function setShowLearningProgressLegend(int $show_learning_progress_legend)/*: void*/ {
		$this->show_learning_progress_legend = $show_learning_progress_legend;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getBorderSizeType(): int {
		return $this->border_size_type;
	}


	/**
	 * @param int $border_size_type
	 */
	public function setBorderSizeType(int $border_size_type)/*: void*/ {
		$this->border_size_type = $border_size_type;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getBorderSize(): int {
		return $this->border_size;
	}


	/**
	 * @param int $border_size
	 */
	public function setBorderSize(int $border_size)/*: void*/ {
		$this->border_size = $border_size;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getBorderColorType(): int {
		return $this->border_color_type;
	}


	/**
	 * @param int $border_color_type
	 */
	public function setBorderColorType(int $border_color_type)/*: void*/ {
		$this->border_color_type = $border_color_type;
	}


	/**
	 * @return string
	 *
	 * @internal
	 */
	public function getBorderColor(): string {
		return $this->border_color;
	}


	/**
	 * @param string $border_color
	 */
	public function setBorderColor(string $border_color)/*: void*/ {
		$this->border_color = $border_color;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getOpenObjWithOneChildDirect(): int {
		return $this->open_obj_with_one_child_direct;
	}


	/**
	 * @param int $open_obj_with_one_child_direct
	 */
	public function setOpenObjWithOneChildDirect(int $open_obj_with_one_child_direct)/*: void*/ {
		$this->open_obj_with_one_child_direct = $open_obj_with_one_child_direct;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getShowImageAsBackground(): int {
		return $this->show_image_as_background;
	}


	/**
	 * @param int $show_image_as_background
	 */
	public function setShowImageAsBackground(int $show_image_as_background)/*: void*/ {
		$this->show_image_as_background = $show_image_as_background;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getShowPreconditions(): int {
		return $this->show_preconditions;
	}


	/**
	 * @param int $show_preconditions
	 */
	public function setShowPreconditions(int $show_preconditions)/*: void*/ {
		$this->show_preconditions = $show_preconditions;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getShowDownloadCertificate(): int {
		return $this->show_download_certificate;
	}


	/**
	 * @param int $show_download_certificate
	 */
	public function setShowDownloadCertificate(int $show_download_certificate)/*: void*/ {
		$this->show_download_certificate = $show_download_certificate;
	}


	/**
	 * @return int
	 *
	 * @internal
	 */
	public function getShowObjectTabs(): int {
		return $this->show_object_tabs;
	}


	/**
	 * @param int $show_object_tabs
	 */
	public function setShowObjectTabs(int $show_object_tabs)/*: void*/ {
		$this->show_object_tabs = $show_object_tabs;
	}


	/**
	 * @return TileProperties
	 */
	public function getProperties(): TileProperties {
		if ($this->properties === NULL) {
			$this->properties = new TileProperties($this);
		}

		return $this->properties;
	}
}