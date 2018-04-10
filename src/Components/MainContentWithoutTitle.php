<?php
/**
 * File holding the MainContentWithoutTitle class
 *
 * This file is part of the MediaWiki skin Chameleon.
 *
 * @copyright 2013 - 2016, Stephan Gambke
 * @license   GNU General Public License, version 3 (or any later version)
 *
 * The Chameleon skin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by the Free
 * Software Foundation, either version 3 of the License, or (at your option) any
 * later version.
 *
 * The Chameleon skin is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * @file
 * @ingroup   Skins
 */

namespace Skins\Chameleon\Components;

use Skins\Chameleon\IdRegistry;

/**
 * The MainContentWithoutTitle class.
 *
 * @author Stephan Gambke
 * @since 1.0
 * @ingroup Skins
 */
class MainContentWithoutTitle extends Component {

	/**
	 * Builds the HTML code for this component
	 *
	 * @return String the HTML code
	 */
	public function getHtml() {

		$skintemplate = $this->getSkinTemplate();
		$idRegistry = IdRegistry::getRegistry();

		// START content
		$ret =
			$this->indent() . '<!-- start the content area -->' .
			$this->indent() . $idRegistry->openElement( 'div',
				array( 'id' => 'content', 'class' => 'mw-body ' . $this->getClassString() )
			) .

			$idRegistry->element( 'a', array( 'id' => 'top' ) ) .
			$this->indent(1) . $idRegistry->element( 'div', array( 'id' => 'mw-indicators', 'class' => 'mw-indicators',  ), $this->buildMwIndicators() ) .

			$this->indent() . '<div ' . \Html::expandAttributes( array(
					'id'    => $idRegistry->getId( 'mw-js-message' ),
					'style' => 'display:none;'
				)
			) . $skintemplate->get( 'userlangattributes' ) . '></div>';

		$ret .= $this->buildContentBody();
		$ret .= $this->buildCategoryLinks();

		$ret .= $this->indent( -1 ) . '</div>';
		// END content

		return $ret;
	}

	protected function getNetworksButtons() {
		$component = new PageNetworksLinks($this->getSkinTemplate());
		return $component->getHtml();
	}

	/**
	 * @return string
	 */

	protected function buildContentBody() {
		return $this->indent() . IdRegistry::getRegistry()->element( 'div', array( 'id' => 'bodyContent' ),
			$this->indent( 1 ) . '<!-- body text -->' . "\n" .
			$this->indent() . $this->getSkinTemplate()->get( 'bodytext' ) .
			$this->indent() . '<!-- end body text -->' .
			$this->buildDataAfterContent() .
			$this->indent( -1 )
		);
	}

	/**
	 * @return string
	 */
	protected function buildCategoryLinks() {
		// TODO: Category links should be a separate component, but
		// * dataAfterContent should come after the the category links.
		// * only one extension is known to use it dataAfterContent and it is geared specifically towards MonoBook
		// => provide an attribute hideCatLinks for the XML and -if present- hide category links and assume somebody knows what they are doing
		return
			$this->indent() . '<!-- category links -->' .
			$this->indent() . $this->getSkinTemplate()->get( 'catlinks' );
	}

	/**
	 * @return string
	 */
	protected function buildDataAfterContent() {

		$skinTemplate = $this->getSkinTemplate();

		if ( $skinTemplate->get( 'dataAfterContent' ) ) {
			return
				$this->indent() . '<!-- data blocks which should go somewhere after the body text, but not before the catlinks block-->' .
				$this->indent() . $skinTemplate->get( 'dataAfterContent' );
		}

		return '';
	}

	/**
	 * @return string
	 */
	private function buildMwIndicators() {

		$idRegistry = IdRegistry::getRegistry();
		$indicators = $this->getSkinTemplate()->get( 'indicators' );

		if ( !is_array( $indicators ) || count( $indicators ) === 0 ) {
			return '';
		}

		$this->indent( 1 );

		$ret = '';

		foreach ( $indicators as $id => $content ) {
			$id = \Sanitizer::escapeId( "mw-indicator-$id" );

			$ret .=
				$this->indent() .
				$idRegistry->element( 'div',
					array(
						'id' => $id,
						'class' => "mw-indicator $id",
					),
					$content
				);
		}

		$ret .= $this->indent( -1 );

		return $ret;
	}

}
