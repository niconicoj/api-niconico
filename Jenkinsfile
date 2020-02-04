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
    		withCredentials([file(credentialsId: 'api-niconico-env', variable: 'ENV_FILE')]) {
           sh '''cp $ENV_FILE .env
php artisan key:generate
php artisan config:cache
           '''
        }
    	}
    }
  }
}