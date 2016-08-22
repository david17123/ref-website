from fabric.api import *

env.hosts = ['ref@ref-au.org']

def testTask():
    run('uname -s')

def sync():
    with cd('/var/www/ref/ref-au/'):
        run('git checkout -f develop')
        run('git pull')
        run('git checkout master')
        run('git merge develop --no-ff')

def deploy():
    with cd('/var/www/ref/ref-au/'):
        run('git checkout -f master')
        run('git pull')
