<?php
/**
 *
 * @file
 * @ingroup   Skins
 */

namespace Skins\Chameleon\Components;

use Hooks;
use Skins\Chameleon\IdRegistry;

/**
 * Custom content header
 *
 * @author 	Julien
 * @since   1.0
 * @ingroup Skins
 */
class MainContentHeader extends Component {

	private $mHtml = null;
	private $htmlId = null;

	/**
	 * Builds the HTML code for this component
	 *
	 * @return String the HTML code
	 */
	public function getHtml() {

		if ( $this->mHtml === null ) {
			$this->buildHtml();
		}

		return $this->mHtml;
	}

	/**
	 *
	 */
	protected function buildHtml() {

		if ( $this->getDomElement() === null ) {
			$this->mHtml = '';
			return;
		}

		$this->mHtml =
			$this->buildContentHeaderOpeningTags() .
			$this->buildContentHeaderComponents() .
			$this->buildContentHeaderClosingTags();
	}

	/**
	 * @return string
	 */
	protected function buildContentHeaderOpeningTags() {
		$openingTags =
			$this->indent() . '<!-- main content header -->' .
			$this->indent() . \Html::openElement( 'div', array(
					'id' => 'main-content-header'
				)
			) .
			$this->indent( 1 ) . '<div class="container">';

		$this->indent( 1 );

		return $openingTags;
	}

	/**
	 *
	 */
	protected function buildContentHeaderComponents() {

		$elements = $this->buildContentHeaderElementsFromDomTree();

		if ( !empty( $elements[ 'right' ] ) ) {

			$elements[ 'left' ][ ] =
				$this->indent( 1 ) . '<div class="header-right-aligned">' .
				implode( $elements[ 'right' ] ) .
				$this->indent() . '</div> <!-- header-right-aligned -->';

			$this->indent( -1 );
		}

		return
			$this->buildHead( $elements[ 'head' ] ) .
			$this->buildTail( $elements[ 'left' ] );
	}

	/**
	 * @return string[][]
	 */
	protected function buildContentHeaderElementsFromDomTree() {

		$elements = array(
			'head'  => array(),
			'left'  => array(),
			'right' => array(),
		);

		/** @var \DOMElement[] $children */
		$children = $this->getDomElement()->hasChildNodes() ? $this->getDomElement()->childNodes : array();

		// add components
		foreach ( $children as $node ) {
			$this->buildAndCollectContentHeaderElementFromDomElement( $node, $elements );
		}
		return $elements;
	}

	/**
	 * @param \DOMElement $node
	 * @param $elements
	 */
	protected function buildAndCollectContentHeaderElementFromDomElement( $node, &$elements ) {

		if ( is_a( $node, 'DOMElement' ) && $node->tagName === 'component' && $node->hasAttribute( 'type' ) ) {

			$position = $node->getAttribute( 'position' );

			if ( !array_key_exists( $position, $elements ) ) {
				$position = 'left';
			}

			$indentation = ( $position === 'right' ) ? 2 : 1;

			$this->indent( $indentation );
			$html = $this->buildContentHeaderElementFromDomElement( $node );
			$this->indent( -$indentation );

			$elements[ $position ][ ] = $html;

		} else {
			// TODO: Warning? Error?
		}
	}

	/**
	 * @param \DomElement $node
	 *
	 * @return string
	 */
	protected function buildContentHeaderElementFromDomElement( $node ) {

		switch ( $node->getAttribute( 'type' ) ) {
			case 'Title':
				$html = $this->getTitle( $node );
				break;
			case 'PageLinks':
				$html = $this->getPageLinks( $node );
				break;
			case 'PageToolsDropdown':
				$html = $this->getPageToolsDropdown( $node );
			break;
			case 'PageToolsTabs':
				$html = $this->getPageToolsTabs( $node );
			break;
			default:
		}
		return $html;
	}

	/**
	 * title
	 *
	 * @param \DOMElement $domElement
	 *
	 * @return string
	 */
	protected function getTitle( \DOMElement $domElement = null ) {

		$skintemplate = $this->getSkinTemplate();
		$idRegistry = IdRegistry::getRegistry();

		return $this->indent() . $idRegistry->element( 'h1', array( 'id' => 'firstHeading', 'class' => 'firstHeading' ), $skintemplate->get( 'title' ) );
		
	}

	/**
	 * page, talk, history
	 *
	 * @param \DOMElement $domElement
	 *
	 * @return string
	 */
	protected function getPageToolsTabs( \DOMElement $domElement = null ) {

		$ret = $this->indent().'<!-- Page Tools Tabs -->';
		$ret .= $this->indent().'<div class="page-tools-tabs smooth-scroll">';

		$pageTools = new PageTools( $this->getSkinTemplate());

		$ret .= $pageTools->getPageToolsTabs();
		$ret .= $this->indent().'</div>';

		return $ret;
		
	}

	/**
	 * Page links (favorites, ididit, etc.)
	 *
	 * @param \DOMElement $domElement
	 *
	 * @return string
	 */
	protected function getPageLinks( \DOMElement $domElement = null ) {

		$pageNetworksLinks = new PageNetworksLinks( $this->getSkinTemplate() );

		return $pageNetworksLinks->getHtml();
	}

	/**
	 * Create a dropdown containing the page tools (page, talk, edit, history,
	 * ...)
	 *
	 * @param \DOMElement $domElement
	 *
	 * @return string
	 */
	protected function getPageToolsDropdown( \DOMElement $domElement = null ) {

		$ret = '';

		$pageTools = new PageTools( $this->getSkinTemplate(), $domElement, $this->getIndent() + 1 );

		$pageTools->setRedundant( 'main' );
		$pageTools->setRedundant( 'talk' );
		$pageTools->setRedundant( 'history' );

		$pageTools->setFlat( true );
		$pageTools->removeClasses( 'text-center list-inline' );
		$pageTools->addClasses( 'dropdown-menu' );

		$editLinkHtml = $this->getEditLinkHtml( $pageTools );

		$pageToolsHtml = $pageTools->getHtml();

		if ( $editLinkHtml || $pageToolsHtml ) {
			$ret =
				$this->indent() . '<!-- page tools -->' .
				$this->indent() . '<ul class="page-tools-dropdown" >';

			if ( $editLinkHtml !== '' ) {
				$ret .= $this->indent( 1 ) . $editLinkHtml;
			}

			if ( $pageToolsHtml !== '' ) {
				$ret .=
					$this->indent( 1 ) . '<li class="page-tools-dropdown-tools dropdown">' .
					$this->indent( 1 ) . '<a data-toggle="dropdown" class="dropdown-toggle" href="#" title="' . $this->getSkinTemplate()->getMsg( 'specialpages-group-pagetools' )->text() . '" ><span>...</span></a>' .
					$pageToolsHtml .
					$this->indent( -1 ) . '</li>';
			}

			$ret .=
				$this->indent( -1 ) . '</ul>' . "\n";
		}

		return $ret;
	}

	/**
	 * @param string[] $headElements
	 *
	 * @return string
	 */
	protected function buildHead( $headElements ) {

		$head =
			$this->indent() . "<div class=\"maincontent-header-head\">\n" .
			implode( '', $headElements ) . "\n" .
			$this->indent( -1 ) . "</div>\n";

		return $head;
	}

	/**
	 * @param string[] $tailElements
	 *
	 * @return string
	 */
	protected function buildTail( $tailElements ) {

		return
			$this->indent() . '<div class="maincontent-header-tail">' .
			implode( '', $tailElements ) .
			$this->indent() . '</div>';
	}

	/**
	 * @return string
	 */
	protected function buildContentHeaderClosingTags() {
		return
			$this->indent( -1 ) . '</div>' .
			$this->indent( -1 ) . '</div>' . "\n";
	}

	/**
	 * @param $pageTools
	 * @param $editActionId
	 *
	 * @return string
	 */
	protected function getLinkAndRemoveFromPageToolStructure( $pageTools, $editActionId ) {

		$pageToolsStructure  = $pageTools->getPageToolsStructure();
		$editActionStructure = $pageToolsStructure[ 'views' ][ $editActionId ];

		$editActionStructure[ 'text' ] = '';

		if ( array_key_exists( 'class', $editActionStructure ) ) {
			$editActionStructure[ 'class' ] .= ' page-tools-dropdown-tools';
		} else {
			$editActionStructure[ 'class' ] = 'page-tools-dropdown-tools';
		}

		$options = array (
			'text-wrapper' => array(
				'tag' => 'span',
				'attributes' => array('class' => 'glyphicon glyphicon-pencil',)
			),
		);

		$editLinkHtml = $this->getSkinTemplate()->makeListItem(
			$editActionId,
			$editActionStructure,
			$options
		);

		$pageTools->setRedundant( $editActionId );

		return $editLinkHtml;
	}

	/**
	 * @param $pageTools
	 * @return string
	 */
	protected function getEditLinkHtml( $pageTools ) {

		$pageToolsStructure = $pageTools->getPageToolsStructure();

		if ( array_key_exists( 'views', $pageToolsStructure ) &&
			array_key_exists( 'sfgRenameEditTabs', $GLOBALS ) &&
			array_key_exists( 'formedit', $pageToolsStructure[ 'views' ] ) && // SemanticForms 3.5+
			$GLOBALS[ 'sfgRenameEditTabs' ] === true

		) {

			$editLinkHtml = $this->getLinkAndRemoveFromPageToolStructure( $pageTools, 'formedit' );
			return $editLinkHtml;

		} elseif ( array_key_exists( 'views', $pageToolsStructure ) &&
			array_key_exists( 'sfgRenameEditTabs', $GLOBALS ) &&
			array_key_exists( 'form_edit', $pageToolsStructure[ 'views' ] ) && // SemanticForms <3.5
			$GLOBALS[ 'sfgRenameEditTabs' ] === true

		) {

			$editLinkHtml = $this->getLinkAndRemoveFromPageToolStructure( $pageTools, 'form_edit' );
			return $editLinkHtml;

		} elseif ( array_key_exists( 'views', $pageToolsStructure ) &&
			array_key_exists( 've-edit', $pageToolsStructure[ 'views' ] )
		) {

			$editLinkHtml = $this->getLinkAndRemoveFromPageToolStructure( $pageTools, 've-edit' );
			return $editLinkHtml;

		} elseif ( array_key_exists( 'views', $pageToolsStructure ) &&
			array_key_exists( 'edit', $pageToolsStructure[ 'views' ] )
		) {

			$editLinkHtml = $this->getLinkAndRemoveFromPageToolStructure( $pageTools, 'edit' );
			return $editLinkHtml;

		}
		return '';
	}

}
