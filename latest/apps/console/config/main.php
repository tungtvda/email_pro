<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * Console application main configuration file
 *
 * This file should not be altered in any way!
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */

return array(
    'basePath' => Yii::getPathOfAlias('console'),

    'preload' => array(
        'consoleSystemInit'
    ),

    'import' => array(
        'console.components.*',
        'console.components.db.*',
        'console.components.db.ar.*',
        'console.components.web.*',
        'console.components.console.*',
    ),

    'commandMap' => array(
        'migrate' => array(
            'class'             => 'system.cli.commands.MigrateCommand',
            'migrationPath'     => 'console.migrations',
            'migrationTable'    => '{{migration}}',
            'connectionID'      => 'db',
        ),
        'hello' => array(
            'class' => 'console.commands.HelloCommand'
        ),
        'send-campaigns' => array(
            'class' => 'console.commands.SendCampaignsCommand'
        ),
        'bounce-handler' => array(
            'class' => 'console.commands.BounceHandlerCommand'
        ),
        'process-delivery-and-bounce-log' => array(
            'class' => 'console.commands.ProcessDeliveryAndBounceLogCommand'
        ),
        // this command is deprecated since 1.3.3.1 in favor of daily command
        'process-subscribers' => array(
            'class' => 'console.commands.ProcessSubscribersCommand'
        ),
        'option' => array(
            'class' => 'console.commands.OptionCommand'
        ),
        'feedback-loop-handler' => array(
            'class' => 'console.commands.FeedbackLoopHandlerCommand'
        ),
        'send-transactional-emails' => array(
            'class' => 'console.commands.SendTransactionalEmailsCommand'
        ),
        'daily' => array(
            'class' => 'console.commands.DailyCommand'
        ),
        'update' => array(
            'class' => 'console.commands.UpdateCommand'
        ),
        'archive-campaigns-delivery-logs' => array(
            'class' => 'console.commands.ArchiveCampaignsDeliveryLogsCommand'
        ),
        'queue' => array(
            'class' => 'console.commands.RedisQueueCommand'
        ),
        'list-import' => array(
            'class' => 'console.commands.ListImportCommand'
        ),
        'list-export' => array(
            'class' => 'console.commands.ListExportCommand'
        ),
        'mailerq-handler-daemon' => array(
            'class' => 'console.commands.MailerqHandlerDaemon'
        ),
        'table-cleaner' => array(
            'class' => 'console.commands.TableCleanerCommand'
        ),
        'clear-cache' => array(
            'class' => 'console.commands.ClearCacheCommand'
        ),
        'translate' => array(
            'class' => 'console.commands.TranslateCommand'
        ),
        'email-blacklist-monitor' => array(
            'class' => 'console.commands.EmailBlacklistMonitorCommand'
        ),
        'reset-customers-quota' => array(
            'class' => 'console.commands.ResetCustomersQuotaCommand'
        ),
        'move-inactive-subscribers' => array(
            'class' => 'console.commands.MoveInactiveSubscribersCommand'
        ),
        'delete-inactive-subscribers' => array(
            'class' => 'console.commands.DeleteInactiveSubscribersCommand'
        ),
    ),

    'components' => array(
        'consoleSystemInit' => array(
            'class' => 'console.components.init.ConsoleSystemInit',
        ),
    ),
);
