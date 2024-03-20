import { ApiMethods } from '@/helpers/entities/ApiMethods'
import type { AuthDto } from './auth/AuthDto'

export class UserApi extends ApiMethods {
  async auth(authDto: AuthDto) {
    const token = this.postData('auth', authDto)
  }
}
