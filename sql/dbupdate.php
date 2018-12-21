<#1>
<?php
\srag\Plugins\SrTile\Config\Config::updateDB();
\srag\Plugins\SrTile\Tile\Tile::updateDB();
\srag\Plugins\SrTile\Rating\Rating::updateDB();

// Create default values for top tile
if (\srag\Plugins\SrTile\Tile\Tiles::getInstance()->getInstanceForObjRefId(ROOT_FOLDER_ID, false)->getTileId() === 0) {
	$tile = \srag\Plugins\SrTile\Tile\Tiles::getInstance()->getInstanceForObjRefId(ROOT_FOLDER_ID);
	$tile->setTileEnabledChildren(true);
	$tile->setActionsPosition(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_ACTIONS_POSITION);
	$tile->setActionsVerticalAlign(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_ACTIONS_VERTICAL_ALIGN);
	$tile->setBackgroundColorType(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_BACKGROUND_COLOR_TYPE);
	$tile->setEnableRating(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_ENABLE_RATING);
	$tile->setFontColorType(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_FONT_COLOR_TYPE);
	$tile->setFontSizeType(\srag\Plugins\SrTile\Tile\Tile::MARGIN_TYPE_SET);
	$tile->setFontSize(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_FONT_SIZE);
	$tile->setImagePosition(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_IMAGE_POSITION);
	$tile->setLabelHorizontalAlign(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_LABEL_HORIZONTAL_ALIGN);
	$tile->setLabelVerticalAlign(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_LABEL_VERTICAL_ALIGN);
	$tile->setMarginType(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_MARGIN_TYPE);
	$tile->setMargin(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_MARGIN);
	$tile->setObjectIconPosition(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_OBJECT_ICON_POSITION);
	$tile->setRecommendMailTemplateType(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_RECOMMENDATION_MAIL_TEMPLATE_TYPE);
	$tile->setShowActions(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_SHOW_ACTIONS);
	$tile->setShowFavoritesIcon(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_SHOW_FAVORITES_ICON);
	$tile->setShowTitle(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_SHOW_TITLE);
	$tile->setShowLearningProcess(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_SHOW_LEARNING_PROCCESS);
	$tile->setShowLikesCount(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_SHOW_LIKES_COUNT);
	$tile->setShowRecommendIcon(\srag\Plugins\SrTile\Tile\Tile::DEFAULT_SHOW_RECOMMEND_ICON);
	$tile->store();
}
?>
