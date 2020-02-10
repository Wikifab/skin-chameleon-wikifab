<?php
/**
 *
 * @file
 * @ingroup   Skins
 */

namespace Skins\Chameleon\Components;

/**
 * Custom content header
 *
 * @author 	Pierre
 * @since   1.0
 * @ingroup Skins
 */
class AdditionalsPageHeader extends Component {

	private $mHtml = null;
	private $htmlId = null;
	private $headerDomElement = null;


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
			$this->indent() . '<!-- additionnal page header -->' .
			$this->indent() . \Html::openElement( 'div', array(
					'id' => 'additionnal-page-header'
				)
			) .
			$this->indent( 1 ) . '<div class="container">';

		$this->indent( 1 );

		return $openingTags;
	}


	/**
	 * @return string
	 */
	protected function buildContentHeaderClosingTags() {
		return
			$this->indent( -1 ) . '</div>' .
			$this->indent( -1 ) . '</div>' . "\n";
			$this->indent() . '<!-- Fin additionnal page header -->' . "\n";
	}

	/**
	 *
	 */
	protected function buildContentHeaderComponents() {

		$result = '';

		$skin = $this->getSkinTemplate();


		$components = $this->getSkinTemplate()->getSkin()->getOutput()->getProperty('AdditionnalHeaderComponents');

		if (! $components) {
			return '';
		}

		foreach ($components as $component) {
			// build dom element representing component :
			$componentDom = new \DOMElement( 'component', '' );
			$this->getDomElement()->appendChild($componentDom);
			//var_dump($componentDom);flush();
			$componentDom->setAttribute('type', $component['component']);

			$component = $this->getSkinTemplate()->getComponent( $componentDom, $this->getIndent() + 1 );

			$result .= $component->getHtml();
		}

		return $result;
	}


}
