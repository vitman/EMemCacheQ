EMemCacheQ
==========

Yii framework MemcacheQ extension

Simple class for memcacheQ. I think it can be helpful for those, who want to use memcacheQ, but dont want to use Yii default memcache class because it a bit awkward.
Requirements

Installed memcacheq and php extension to use it.

Usage

copy EMemCacheQ folder to your application.extensions folder
add in your config in components section:


     'components' => array(
    //..//
    'mailQueue' => array( //name can be whatever you want
            'class' => 'ext.ememcacheq.EMemCacheQ',
            'server' => array(
                    'host' => 'localhost', 
                    'port' => 22201,
                    'nameQueue'=>'mail' // queue name.
            )
        ),
    /* you can use any count of queues
    'otherQueue' => array(
            'class' => 'EMemCacheQ',
            'server' => array(
                    'host' => 'localhost', 
                    'port' => 22201,
                    'nameQueue'=>'otherQueue'
            )
        ),*/
)

Than in you code just

    Yii::app()->mailQueue->set('value1');
    Yii::app()->mailQueue->set('value2');
    echo Yii::app()->mailQueue->get();
    echo Yii::app()->mailQueue->get();

if queue is empty, get() wil return false;
