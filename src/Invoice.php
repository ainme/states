<?php
namespace Tools\States;

use Tools\States\ContextStates\ApprovedStatus;
use Tools\States\ContextStates\DraftStatus;
use Tools\States\ContextStates\PendingStatus;
use Tools\States\ContextStates\ProcessingStatus;

class Invoice
{
	public $status = 'draft';
	public $reason = '';

	public function getCurrentContextState($context)
	{
		$contextStatus = 'Tools\States\ContextStates\\' . ucfirst($this->status) . 'Status';
		return new $contextStatus($context);
	}
}