<?php
/**
 * File containing the Wikifab Footer class
 *
 *
 * @file
 * @ingroup   Skins
 */

namespace Skins\Chameleon\Components;

use Linker;

/**
 * ToolbarHorizontal class
 *
 * A horizontal toolbar containing standard sidebar items (toolbox, language links).
 *
 * The toolbar is an unordered list in a nav element: <nav role="navigation" id="p-tb" >
 *
 * @author Stephan Gambke
 * @since 1.0
 * @ingroup Skins
 */
class WikifabPrintHeader extends Component {

	/**
	 * Builds the HTML code for this component
	 *
	 * @return String the HTML code
	 */
	public function getHtml() {
		global $wgLogoMD;

		// get page info :
		$pageUrl = " " . $this->getSkin()->getTitle()->getFullURL();
		$timestamp = $this->getSkin()->getOutput()->getRevisionTimestamp();
		$lasteditDate = $this->getSkin()->getLanguage()->userDate( $timestamp, $this->getSkin()->getUser() );
		$lasteditTime = $this->getSkin()->getLanguage()->userTime( $timestamp, $this->getSkin()->getUser() );

		$ret = \Html::openElement("div", array('class'=> 'print-only printWikifabHeader'));
		$ret .= \Html::openElement("div", array('class'=> 'container'));
		$ret .= \Html::openElement("div", array('class'=> 'row'));

		// Logo
		$logo = $this->getSkinTemplate()->data[ 'logopath' ];
		if ($wgLogoMD) {
			$logo = $wgLogoMD;
		}
		$ret .= \Html::openElement("div", array('class'=> 'col-md-12 logo'));
		$ret .= \Html::element( 'img',
				array(
						'src' => $logo,
						'alt' => $this->getSkinTemplate()->data[ 'sitename' ],
				)
				);
		// close logo div
		$ret .= \Html::closeElement("div");

		// close row div
		$ret .= \Html::closeElement("div");
		// close container div
		$ret .= \Html::closeElement("div");
		// close printWikifabHeader div
		$ret .= \Html::closeElement("div");

		return $ret;
	}

	/**
	 * unused
	 *
	 * @param string $class
	 * @return string
	 */
	private function getTitleInfoDiv ($class='') {
		$ret = \Html::openElement("div", array('class'=> $class . ' header-info'));
		$ret .= \Html::Element("h1", array('class'=> 'footerText firstHeading'), $this->getSkinTemplate()->data['title']);

		$ret .= \Html::openElement("span",['class' => 'urllink']);
		//$ret .= wfMessage( 'wfprint-pagelink', $pageUrl );
		$ret .= $pageUrl ;
		$ret .= \Html::closeElement("span");
		$ret .= \Html::closeElement("div");

		return $ret;
	}
}
