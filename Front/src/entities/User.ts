import type { Profil } from './Profil'

export class User {
  constructor(
    public id: number,
    public email: string,
    public roles: string[],
    public profil: Profil | Partial<Profil>,
    public password?: string
  ) {}
}
