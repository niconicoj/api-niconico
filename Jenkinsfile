pipeline {
  agent {
    dockerfile {
      filename 'Dockerfile'
    }
  }
  stages {
    stage('Build') {
      steps {
        sh '''composer i --no-progress'''
      }
    }

    stage('configure') {
    	steps {
    		withCredentials([file(credentialsId: 'api-niconico-env', variable: 'dot-env'),
                         file(credentialsId: 'PUBLIC_KEY', variable: 'my-public-key')]) {
           sh '''cp \$dot-env ./.env
php artisan key:generate
php artisan config:cache
           '''
        }
    	}
    }
  }
}