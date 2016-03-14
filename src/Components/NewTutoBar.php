<?php
/**
 * File holding the NewTutoBar class
 *
 * @file
 * @ingroup Skins
 */

namespace Skins\Chameleon\Components;

use \Linker;
use Skins\Chameleon\IdRegistry;

/**
 * The NewTutoBar class.
 *
 * The search form wrapped in a div: <div id="p-search" role="search" >
 *
 * @author Stephan Gambke
 * @since 1.0
 * @ingroup Skins
 */
class NewTutoBar extends Component {

	/**
	 * Builds the HTML code for this component
	 *
	 * @return string
	 */
	public function getHtml() {

		$newTutoPageTitle = \Title::makeTitle( SF_NS_FORM, ''. wfMessage( 'wfTopButton-Tutorial' )->text() .'');

		$ret = $this->indent() . '<!-- new tuto button -->' .
			$this->indent() . '<div class="wf-top-button">' .
			$this->indent() . '<a href="' . $newTutoPageTitle->getLinkURL() . '">' .
			$this->indent( 1 ) . '<button class="btn" aria-label="create a tutorial" title="' . \Title::makeTitle(SF_NS_FORM,''. wfMessage( 'wfTopButton-Tutorial' )->text() .'') .'">' .
			$this->indent() . '<span class="glyphicon glyphicon-pencil"></span>' .
			//$newtalkLinkText . '" href="' . $user->getTalkPage()->getLinkURL() . '?redirect=no"></a>' .
			$this->indent() . wfMessage( 'wfsearch-newTutorial' )->parse().
			$this->indent( -1 ) . '</button>' .
			$this->indent() . '</a>' .
			$this->indent( -1 ) . '</div>' . "\n".
		    $this->indent() . '<!-- end new tuto button -->' ;

		return $ret;
	}
}
