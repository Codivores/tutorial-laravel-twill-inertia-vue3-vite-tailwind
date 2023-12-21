declare namespace Model {
  export type Page = {
    title: string
    meta_title?: string
    meta_description?: string
    blocks?: Array<Block> | null
  }

  export type Block = {
    editor_name: string
    position: number
    type: string
    content: {} | null
    medias: {} | null
  }

  export type Media = {
    alt?: string
    caption?: string
    height: number
    src?: string
    video?: string
    width: number
  }

  export type MediaWithRoles = {
    default?: Media
    desktop?: Media
    mobile?: Media
    tablet?: Media
  }
}
