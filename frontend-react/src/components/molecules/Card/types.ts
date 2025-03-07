import { PreviewMode } from '../../../constants/enums'

export interface BaseVideo {
  id: string
  title: string
  thumbnail_url: string
  duration: number
  uploaded_at: string
  views: number
  author: string
  video_url: string
}
type BaseCardProps<T extends BaseVideo> = {
  data: T
}
// If the card is interactive, allow callbacks
type InteractiveCardProps<T extends BaseVideo> = BaseCardProps<T> & {
  previewMode: PreviewMode.INTERACTIVE
  onVideoStart?: () => void
  onVideoEnd?: () => void
  onVideoResume?: () => void
  onVideoSeek?: () => void
}

// If the card is static, do NOT allow callbacks
type StaticCardProps<T extends BaseVideo> = BaseCardProps<T> & {
  previewMode: PreviewMode.STATIC
  onVideoStart?: never
  onVideoEnd?: never
  onVideoResume?: never
  onVideoSeek?: never
}

// The final type is a union
export type CardProps<T extends BaseVideo> =
  | InteractiveCardProps<T>
  | StaticCardProps<T>
