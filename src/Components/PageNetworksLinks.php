<?php

namespace Skins\Chameleon\Components;

use MWNamespace;
use Skins\Chameleon\ChameleonTemplate;
use Skins\Chameleon\IdRegistry;

/**
 * The PageTools class.
 *
 * A unordered list containing content navigation links (Page, Discussion,
 * Edit, History, Move, ...)
 *
 * The tab list is a list of lists: '<ul id="p-contentnavigation">
 *
 * @author  Stephan Gambke
 * @since   1.0
 * @ingroup Skins
 */
class PageNetworksLinks extends Component {

	private $mFlat = false;

	/**
	 * @param ChameleonTemplate $template
	 * @param \DOMElement|null  $domElement
	 * @param int               $indent
	 */
	public function __construct( ChameleonTemplate $template, \DOMElement $domElement = null, $indent = 0 ) {

		parent::__construct( $template, $domElement, $indent );

		// add classes for the normal case where the page tools are displayed as a first class element;
		// these classes should be removed if the page tools are part of another element, e.g. nav bar
		$this->addClasses( 'list-inline text-center' );
	}


	public function getButton($type, $pageUri, $counter, $active){

		if ($active){
			$addClass='rmAction';
		} else {
			$addClass='addAction';
		}

		$doLabel = wfMessage('userspageslinks-' . $type);
		$undoLabel = wfMessage('userspageslinks-un' . $type);

		switch($type) {
			case 'star':
				$faClass ='fa fa-heart';
				break;
			case 'member':
				$faClass ='fa fa-group';
				break;
			case 'ididit':
				$faClass ='fa fa-hand-peace-o';
				break;
			default:
				$faClass ='fa fa-eye';
				break;
		}
		$button = '<a class="UsersPagesLinksButton '.$addClass.'" data-linkstype="'.$type.'" data-page="'.$pageUri.'" >';
		$button .= '<button class=" doActionLabel">';
		$button .= '<span class=" "><i class="'.$faClass.'"></i> '.$doLabel.'</span>';
		$button .= '</button>';
		$button .= '</a>';

		$button .= '<a class="UsersPagesLinksButtonCounter '.$addClass.'" data-linkstype="'.$type.'" data-page="'.$pageUri.'" >';
		$button .= '<button>';
		$button .= $counter;
		$button .= '</button>';
		$button .= '</a>';

		return $button;
	}

	/**
	 * Builds the HTML code for this component
	 *
	 * @return string the HTML code
	 */
	public function getHtml() {

		$contentNavigation = $this->getSkinTemplate()->data[ 'content_navigation' ];

		if(!isset($contentNavigation['NetworksLinks'])) {
			return '';
		}

		$ret = $this->indent() . '<div class="PageNetworkLinks">';

		$this->indent( 2 );
		foreach ( $contentNavigation['NetworksLinks'] as $type => $link ) {
			$ret .= $this->indent() . $this->getButton($type, $link['pageUri'], $link['count'], $link['active']);
		}
		$this->indent( -2 );

		$ret .= $this->indent() . '</div>';


		return $ret;
	}

	/**
	 * @return bool
	 */
	protected function hideSelectedNamespace() {
		return
			$this->getDomElement() !== null &&
			filter_var( $this->getDomElement()->getAttribute( 'hideSelectedNameSpace' ), FILTER_VALIDATE_BOOLEAN );
	}

	/**
	 * Generate strings used for xml 'id' names in tabs
	 *
	 * Stolen from MW's Title::getNamespaceKey()
	 *
	 * Difference: This function here reports the actual namespace while the
	 * one in Title reports the subject namespace, i.e. no talk namespaces
	 *
	 * @return string
	 */
	public function getNamespaceKey() {
		global $wgContLang;

		// Gets the subject namespace if this title
		$namespace = $this->getSkinTemplate()->getSkin()->getTitle()->getNamespace();

		// Checks if canonical namespace name exists for namespace
		if ( MWNamespace::exists( $this->getSkinTemplate()->getSkin()->getTitle()->getNamespace() ) ) {
			// Uses canonical namespace name
			$namespaceKey = MWNamespace::getCanonicalName( $namespace );
		} else {
			// Uses text of namespace
			$namespaceKey = $this->getSkinTemplate()->getSkin()->getTitle()->getNsText();
		}

		// Makes namespace key lowercase
		$namespaceKey = $wgContLang->lc( $namespaceKey );
		// Uses main
		if ( $namespaceKey == '' ) {
			$namespaceKey = 'main';
		}
		// Changes file to image for backwards compatibility
		if ( $namespaceKey == 'file' ) {
			$namespaceKey = 'image';
		}
		return $namespaceKey;
	}

	/**
	 * @param string    $category
	 * @param mixed[][] $tabsDescription
	 *
	 * @return string
	 */
	protected function buildTabGroup( $category, $tabsDescription ) {
		// TODO: visually group all links of one category (e.g. some space between categories)

		if ( empty( $tabsDescription ) ) {
			return '';
		}

		$ret = $this->indent() . '<!-- ' . $category . ' -->';

		if ( !$this->mFlat ) {
			$ret .= $this->buildTabGroupOpeningTags( $category );

		}

		foreach ( $tabsDescription as $key => $tabDescription ) {
			$ret .= $this->buildTab( $tabDescription, $key );
		}

		if ( !$this->mFlat ) {
			$ret .= $this->buildTabGroupClosingTags();
		}
		return $ret;
	}

	/**
	 * @param string $category
	 *
	 * @return string
	 */
	protected function buildTabGroupOpeningTags( $category ) {
		// output the name of the current category (e.g. 'namespaces', 'views', ...)
		$ret = $this->indent() .
			\Html::openElement( 'li', array( 'id' => IdRegistry::getRegistry()->getId( 'p-' . $category ) ) ) .
			$this->indent( 1 ) . '<ul class="list-inline" >';

		$this->indent( 1 );
		return $ret;
	}

	/**
	 * @param mixed[] $tabDescription
	 * @param string  $key
	 *
	 * @return string
	 */
	protected function buildTab( $tabDescription, $key ) {

		// skip redundant links (i.e. the 'view' link)
		// TODO: make this dependent on an option
		if ( array_key_exists( 'redundant', $tabDescription ) && $tabDescription[ 'redundant' ] === true ) {
			return '';
		}

		// apply a link class if specified, e.g. for the currently active namespace
		$options = array();
		if ( array_key_exists( 'class', $tabDescription ) ) {
			$options[ 'link-class' ] = $tabDescription[ 'class' ];
		}

		return $this->indent() . $this->getSkinTemplate()->makeListItem( $key, $tabDescription, $options );

	}

	/**
	 * @return string
	 */
	protected function buildTabGroupClosingTags() {
		return $this->indent( -1 ) . '</ul>' .
		$this->indent( -1 ) . '</li>';
	}

	/**
	 * Set the page tool menu to have submenus or not
	 *
	 * @param boolean $flat
	 */
	public function setFlat( $flat ) {
		$this->mFlat = $flat;
	}


}
